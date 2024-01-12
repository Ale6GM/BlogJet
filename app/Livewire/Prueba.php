<?php

namespace App\Livewire;

use Livewire\Component;

class Prueba extends Component
{
    public $search = "Hola Mundo";
    public function render()
    {
        return view('livewire.prueba');
    }
}
