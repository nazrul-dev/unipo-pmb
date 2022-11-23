<?php

namespace App\Http\Livewire\Pages;

use Livewire\Component;

class Landing extends Component
{
    public function render()
    {
        return view('livewire.pages.landing')->layout('layouts.guest');
    }
}
