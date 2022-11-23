<?php

namespace App\Http\Livewire\Pages;

use App\Models\Maba;
use Livewire\Component;
use Livewire\WithFileUploads;

class Pembayaran extends Component
{
    use WithFileUploads;
    public $bukti;
    public $modalPreview = false,
        $filepathPreview;
    public function updatedBukti()
    {
        $this->validate([
            'bukti' => 'image|max:5024',
        ]);

        $path = $this->bukti->store('bukti-pembayaran');
        $maba = Maba::where('email', auth()->user()->email)->first();
        $maba->update([
            'bukti' => $path
        ]);
    }

    public function handlePreview($filepath)
    {
        $this->filepathPreview = $filepath;
        $this->modalPreview = !$this->modalPreview;
    }
    public function render()
    {
        $maba = Maba::where('email', auth()->user()->email)->first();
       
        return view('livewire.pages.pembayaran', compact('maba'));
    }
}
