<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class CreatePost extends Component implements HasForms
{
    use InteractsWithForms;

    public function render()
    {
        return view('livewire.create-post');
    }

}
