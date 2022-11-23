<?php

namespace App\Http\Livewire\Pages\Admin;

use Illuminate\Support\Facades\Hash;
use App\Models\Maba as ModelsMaba;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class Maba extends Component
{
    use Actions;
    public $modalPreview = false, $filepathPreview;
    public $modalPass = false, $pass;
    public $no_reg = '', $modalKonfirmasi = false;
    public $type = 'konf';
    public $showButton = false, $showButtonReset = false, $showButtonBayar = false, $cekBtn = false, $showButtonTerima = false;
    protected $listeners = ['handleKonfirmasi', 'handleBukti'];
    public function render()
    {
        return view('livewire.pages.admin.maba')->layout('layouts.admin');
    }


    public function handleBukti($path)
    {
        $d = ModelsMaba::find($path)->first();
      
        if ($d) {
            $this->modalPreview = !$this->modalPreview;
            $this->filepathPreview = $d->bukti;
        } else {
            return $this->notification()->warning(
                $title = 'Error',
                $description = 'harap Refresh Kembali'
            );
        }
        
    }
    public function handleKonfirmasi($type)
    {
        $this->reset();
        $this->type =  $type['type'];
        $this->modalKonfirmasi = !$this->modalKonfirmasi;
    }


    public function checkMaba($reg)
    {
        $q =  ModelsMaba::where('no_reg', $reg)->first();
        if ($q) {
            return $q;
        }
    }
    public function bayar()
    {
        if ($this->showButtonBayar) {
            $q = ModelsMaba::where('no_reg', $this->no_reg)->first();
            $q->update([
                'terbayar' => true
            ]);
            $this->reset('showButtonBayar', 'showButton', 'cekBtn', 'no_reg');
            return $this->notification()->success(
                $title = 'Success',
                $description = 'Berhasil Melakukan Pembayaran Pada Nomor Registrasi ' . $this->no_reg
            );
        } else {
            return $this->notification()->warning(
                $title = 'Error',
                $description = 'harap Cek Kembali No Registrasi'
            );
        }
    }
    public function terima()
    {
        if ($this->showButtonBayar) {
            $q = ModelsMaba::where('no_reg', $this->no_reg)->first();
            $q->update([
                'terima' => true
            ]);
            $this->reset('showButtonTerima', 'showButton', 'cekBtn', 'no_reg');
            return $this->notification()->success(
                $title = 'Success',
                $description = 'Berhasil Melakukan Konfirmasi Formulir Pada Nomor Registrasi ' . $this->no_reg
            );
        } else {
            return $this->notification()->warning(
                $title = 'Error',
                $description = 'harap Cek Kembali No Registrasi'
            );
        }
    }
    public function cek()
    {

        if ($this->checkMaba($this->no_reg)) {
            if ($this->type !== 'reset') {
                if ($this->checkMaba($this->no_reg)->terbayar && $this->checkMaba($this->no_reg)->terima) {
                    return $this->notification()->warning(
                        $title = 'Peringatan!!',
                        $description = 'No Registrasi Ini Sudah Di Bayar Dan Dikonfirmasi '
                    );
                } else {
                    if (!$this->checkMaba($this->no_reg)->terbayar) {
                        $this->showButtonBayar = true;
                        $this->showButton = true;
                        return $this->notification()->success(
                            $title = 'Success',
                            $description = 'Berhasil Melakukan Pengecekan'
                        );
                    } else if (!$this->checkMaba($this->no_reg)->terima) {
                        $this->showButtonTerima = true;
                        $this->showButton = true;
                        return $this->notification()->success(
                            $title = 'Success',
                            $description = 'Berhasil Melakukan Pengecekan'
                        );
                    } else {
                        return $this->notification()->warning(
                            $title = 'Peringatan!!',
                            $description = 'No Registrasi Ini Sudah Di Bayar Dan Dikonfirmasi'
                        );
                    }
                }
            } else {
                $this->showButtonReset = true;
            }
        } else {
            return $this->notification()->warning(
                $title = 'Peringatan!!',
                $description = 'No Registrasi Tidak Ditemukan'
            );
        }
    }
    public function updatedNoReg($value)
    {
        $this->reset('showButtonBayar', 'showButton', 'cekBtn');
        if ($value) {
            if (strlen($value) >= 19) {
                $this->cekBtn = true;
            }
        }
    }

    public function resetPass()
    {
        if ($this->showButtonReset) {
            $q = ModelsMaba::where('no_reg', $this->no_reg)->first();
            $id = $q->user_id;
            $user = User::find($id);
            $randomPass =  quickRandom(8);
            $user->update([
                'password' => Hash::make($randomPass)
            ]);

            $this->modalPass = true;
            $this->pass = $randomPass;
        }
    }
}
