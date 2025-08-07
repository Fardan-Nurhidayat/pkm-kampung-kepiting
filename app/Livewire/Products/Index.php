<?php

namespace App\Livewire\Products;

use App\Models\Product;
use App\Models\ProductLike;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.guest')]
class Index extends Component
{
    public $products;
    public $totalRatings;
    public $hasLiked;

    public function mount()
    {
        $this->products = Product::with(['product_likes', 'product_ratings'])
            ->orderBy('created_at', 'desc')
            ->get();            
    }

    public function toggleLike($productId)
    {
        if (!Auth::check()) {
            return; // Optional: bisa redirect atau emit event untuk trigger login modal
        }

        $like = ProductLike::where('product_id', $productId)
            ->where('user_id', Auth::id())
            ->first();

        if ($like) {
            $like->delete();
        } else {
            ProductLike::create([
                'product_id' => $productId,
                'user_id' => Auth::id(),
            ]);
        }

        // Refresh product data (reload relationships)
        $this->products = Product::with(['product_likes', 'product_ratings'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.products.index');
    }
}
