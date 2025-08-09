<?php

namespace App\Livewire;

use App\Models\Galeri;
use App\Models\Review;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Computed;

#[Title('Welcome')]
#[Computed(persist: true, seconds: 86400)]
class Welcome extends Component
{
    public $galeris;
    public $reviews;
    public $bestProducts;

    public function mount()
    {
        $this->galeris = Galeri::getGaleriCache();
        $this->reviews = Review::getCacheReview()->sortByDesc('created_at')->take(3);
        $this->bestProducts = Product::bestProduct();
    }


    public function render()
    {
        return view('livewire.welcome');
    }
}
