<?php

namespace App\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductLike;
use App\Models\ProductRating;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;

#[Layout('components.guest')]
class Show extends Component
{
    public Product $product;
    public $products;
    public bool $userHasLiked;
    public $userRating;
    public $review;

    public function mount($slug)
    {        
        $this->product = Product::where('slug', $slug)
            ->with(['product_likes', 'product_ratings.user'])
            ->firstOrFail();

        $this->products = Product::with(['product_likes', 'product_ratings'])
            ->orderBy('created_at', 'desc')
            ->where('id', '!=', $this->product->id)
            ->get();

            // dd($this->products);

        if (Auth::user()) {
            $this->userHasLiked = $this->product->product_likes->where('user_id', Auth::user()->id)->count() > 0;
            $this->userRating = $this->product->product_ratings->where('user_id', Auth::user()->id)->first()?->rating ?? 0;
            $this->review = $this->product->product_ratings->where('user_id', Auth::user()->id)->first()?->review ?? '';
        } else {
            $this->userHasLiked = false;
            $this->userRating = 0;
            $this->review = '';
        }
    }

    public function toggleLike()
    {
        // dd('toggleLike called');
        if (!Auth::check()) return;

        $like = ProductLike::where('product_id', $this->product->id)
            ->where('user_id', Auth::user()->id)
            ->first();

        if ($like) {
            $like->delete();
            session()->flash('message', 'Berhasil membatalkan like');
        } else {
            ProductLike::create([
                'product_id' => $this->product->id,
                'user_id' => Auth::user()->id,
            ]);
            session()->flash('message', 'Produk disukai!');
        }

        $this->userHasLiked = !$this->userHasLiked;
        $this->product->refresh();
    }

    public function foo()
    {
        dd('foo called');
    }


    public function submitReview()
    {
        if (!Auth::check()) return;

        $this->validate([
            'userRating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
        ]);

        ProductRating::updateOrCreate(
            ['product_id' => $this->product->id, 'user_id' => Auth::user()->id],
            ['rating' => $this->userRating, 'review' => $this->review]
        );

        session()->flash('message', 'Review berhasil disimpan!');
        $this->product->refresh();
    }


    public function render()
    {
        return view('livewire.products.show');
    }
}

?>