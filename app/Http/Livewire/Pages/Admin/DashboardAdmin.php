<?php

namespace App\Http\Livewire\Pages\Admin;

use Livewire\Component;

class DashboardAdmin extends Component
{
    public function render()
    {
        return view('livewire.pages.admin.dashboard-admin')->layout('layouts.admin');
    }
}
