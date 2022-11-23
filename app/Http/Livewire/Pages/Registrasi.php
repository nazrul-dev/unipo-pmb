<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Hash;
use App\Models\Maba;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class Registrasi extends Component
{
    use Actions, WithFileUploads;
    public $jurusanCustom = '', $jurusanCustomShow = false;
    public $password = '';
    public
        $nama,
        $jk,
        $tl,
        $ttl,
        $agama,
        $alamat,
        $tlp,
        $asal_sekolah,
        $jurusan,
        $no_reg,
        $pk,
        $prodi,
        $email,
        $ukuran_baju,
        $photo;


    public $step = 1;

    public function mount()
    {
        $this->no_reg = 'REG-' . Carbon::now()->format('ymdhis') . quickRandom(3);
    }



    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);
    }



    public function updatedJurusan($value)
    {

        if ($value === 'Lainnya') {
            $this->jurusanCustomShow = true;
        } else {
            $this->jurusanCustomShow = false;
            $this->jurusanCustom = '';
        }
    }
    public function handleStep2()
    {




        if (
            $this->nama &&
            $this->jk &&
            $this->tl &&
            $this->ttl &&
            $this->agama &&
            $this->alamat &&
            $this->tlp &&
            $this->asal_sekolah &&
            $this->jurusan &&
            $this->pk &&
            $this->email &&
            $this->ukuran_baju
        ) {
            $user = User::where('email', $this->email)->first();
            if ($user === null) {
                $this->step = 2;
            } else {
                return $this->notification()->warning(
                    $title = 'Peringatan!!',
                    $description = 'Email Yang Anda Inputkan Sudah Pernah Terdaftar'
                );
            }
        } else {
            return $this->notification()->warning(
                $title = 'Peringatan!!',
                $description = 'Harap Mengisi Semua Form Yang ada'
            );
        }
    }

    public function changeStep($step)
    {
        $this->step = $step;
    }


    public function selesai()
    {
        if ($this->photo) {
            DB::beginTransaction();
            try {
                $photo = $this->photo->store('passphoto');
                $randomPass =  quickRandom(8);
                $user = User::create([
                    'name' =>  $this->nama,
                    'email' => $this->email,
                    'password' =>  Hash::make($randomPass)
                ]);
                Maba::create([
                    'user_id' =>  $user->id,
                    'no_reg' => $this->no_reg,
                    'nama' => $this->nama,
                    'jk' => $this->jk,
                    'tl' => $this->tl,
                    'ttl' => $this->ttl,
                    'agama' => $this->agama,
                    'alamat' => $this->alamat,
                    'tlp' => $this->tlp,
                    'asal_sekolah' => $this->asal_sekolah,
                    'jurusan' => $this->jurusan === 'Lainnya' ? $this->jurusanCustom : $this->jurusan,
                    'no_reg' => $this->no_reg,
                    'pk' => $this->pk,
                    'prodi' => $this->prodi,
                    'email' => $this->email,
                    'ukuran_baju' => $this->ukuran_baju,
                    'photo' => $photo,
                    'terbayar' => false,
                ]);

                DB::commit();
                $this->password =  $randomPass;
                $this->step = 3;
            } catch (\Throwable $th) {
                DB::rollback();
            }
        } else {
            return $this->notification()->warning(
                $title = 'Peringatan!!',
                $description = 'Harap Mengupload Foto'
            );
        }
    }
    public function render()
    {
        return view('livewire.pages.registrasi')->layout('layouts.guest');
    }
}
