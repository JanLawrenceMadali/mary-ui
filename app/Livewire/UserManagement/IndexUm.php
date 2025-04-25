<?php

namespace App\Livewire\UserManagement;

use Livewire\Component;
use App\Models\User;

class IndexUm extends Component
{
    public $users;
    public $headers = [
        ['key' => 'name', 'label' => 'Name', 'class' => 'w-72'],
        ['key' => 'email', 'label' => 'E-mail', 'sortable' => false],
        ['key' => 'created_at', 'label' => 'Created At', 'format' => ['date', 'Y-m-d h:i A']],
        ['key' => 'updated_at', 'label' => 'Updated At', 'format' => ['date', 'Y-m-d h:i A']],
        ];

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.user-management.index-um');
    }
}
