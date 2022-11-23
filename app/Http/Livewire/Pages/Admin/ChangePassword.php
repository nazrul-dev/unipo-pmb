<?php

namespace App\Http\Livewire\Pages\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use WireUi\Traits\Actions;

class ChangePassword extends Component
{
    use Actions;
    public $password;

    public function save()
    {
        User::find(auth()->user()->id)->update([
            'password' => Hash::make($this->password)
        ]);
        return $this->notification()->success(
            $title = 'Success',
            $description = 'Ganti Password Berhasil'
        );
    }
    public function render()
    {
        return view('livewire.pages.admin.change-password')->layout('layouts.admin');
    }
}
