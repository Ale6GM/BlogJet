<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    public function render()
    {
        // Aqui buscamos por el nombre o por el Email usando (orWhere)
        $users = User::where('name', 'LIKE' , '%' . $this->search . '%')-> orWhere('email', 'LIKE' , '%' . $this->search . '%')->paginate(15);

        return view('livewire.admin.user-index', compact('users'));
    }

    public function updatingSearch() {
        $this->resetPage();
    }
}
