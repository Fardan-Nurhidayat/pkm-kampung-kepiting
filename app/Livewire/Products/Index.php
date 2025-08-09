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
    public $searchInput = '';
    public $categoryFilter = '';
    public $priceFilter = '';
    public $sortFilter = '';

    public $products;
    
    public function mount()
    {
        // Kosongkan, kita akan handle query di render()
        $this->products = collect();
    }

    public function updated($property)
    {
        // Saat filter berubah, render ulang otomatis
        $this->render();
    }

    public function clearFilters()
    {
        $this->reset(['searchInput', 'categoryFilter', 'priceFilter', 'sortFilter']);
    }

    public function toggleLike($productId)
    {
        if (!Auth::check()) {
            return;
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
    }

    public function render()
    {
        $query = Product::with(['product_likes', 'product_ratings']);

        // Filter Search
        if (!empty($this->searchInput)) {
            $query->where('name', 'like', '%' . $this->searchInput . '%');
        }

        // Filter Kategori
        if (!empty($this->categoryFilter)) {
            $query->where('category', $this->categoryFilter);
        }

        // Filter Harga
        if (!empty($this->priceFilter)) {
            [$min, $max] = explode('-', $this->priceFilter);
            $query->whereBetween('price', [(float)$min, (float)$max]);
        }

        // Sort Produk
        switch ($this->sortFilter) {
            case 'name-asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name-desc':
                $query->orderBy('name', 'desc');
                break;
            case 'price-asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('price', 'desc');
                break;
            case 'rating-desc':
                $query->withAvg('product_ratings', 'rating')
                      ->orderBy('product_ratings_avg_rating', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        $this->products = $query->get();

        return view('livewire.products.index', [
            'products' => $this->products
        ]);
    }
}
