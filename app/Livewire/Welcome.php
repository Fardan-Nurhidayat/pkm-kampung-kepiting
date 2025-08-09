<?php

namespace App\Livewire;

use App\Models\Galeri;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Welcome')]
#[Computed(persist: true , seconds: 86400)]
class Welcome extends Component
{
    public $galeris;
    public $reviews;

    public function mount(){
       $this->galeris = Galeri::getGaleriCache();
    }


    public function render()
    {
        return view('livewire.welcome');
    }
}
