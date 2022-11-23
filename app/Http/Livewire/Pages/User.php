<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Hash;
use App\Models\User as ModelsUser;
use Livewire\Component;
use WireUi\Traits\Actions;

class User extends Component
{
    use Actions;
    public $field = [], $formActive = false, $identity = [];
    protected $listeners = ['handleForm','refreshComponent' => '$refresh'];

    public function mount()
    {
    }
    public function render()
    {
       
        return view('livewire.pages.user');
    }

 

    public function handleForm($id = null)
    {

        if ($id != null) {
            $user = ModelsUser::find($id)->first();
            $this->identity = $user;
            $this->field = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => '',
            ];
        } else {
            $this->reset('identity', 'field');
            $this->field = [
                'name' => '',
                'email' => '',
                'password' => '',
            ];
        }

        $this->formActive = !$this->formActive;
    }

    public function save()
    {

        if (!array_key_exists("password", $this->field)) {
            return $this->notification()->error(
                $title = 'Error Validation',
                $description = 'Password Required'
            );
        }

        $this->field['password'] = Hash::make($this->field['password']);
        ModelsUser::create($this->field);
        $this->reset();
        $this->emit('refreshComponent');
        return $this->notification()->success(
            $title = 'Success',
            $description = 'Berhasil Menambahkan User'
        );
    }
}
