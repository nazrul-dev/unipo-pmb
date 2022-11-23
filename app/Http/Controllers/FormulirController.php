<?php

namespace App\Http\Controllers;

use App\Models\Maba;
use Illuminate\Http\Request;
use PDF;
use QrCode;

class FormulirController extends Controller
{
    public function view($id = null)
    {
        if (!$id) {
            $maba = Maba::where('email', auth()->user()->email)->first();
        } else {
            if (auth()->user()->role != 'admin') {
                return abort(404);
            }
            $maba = Maba::where('id', $id)->first();
        }

        $qr = QrCode::size(115)->color(180, 56, 167)->generate($maba->id);
        $pdf = PDF::loadview('pdf/formulir', [
            'maba' => $maba,

            'qr' =>  'data:image/svg+xml;base64,' . base64_encode($qr)

        ]);
        $pdf->render();
        return $pdf->stream('formulir-' . $maba->no_reg . '.pdf');
    }

    public function download($id = null)
    {
        if (!$id) {
            $maba = Maba::where('email', auth()->user()->email)->first();
        } else {
            if (auth()->user()->role != 'admin') {
                return abort(404);
            }
            $maba = Maba::where('id', $id)->first();
        }

        $qr = QrCode::size(115)->color(180, 56, 167)->generate($maba->id);
        $pdf = PDF::loadview('pdf/formulir', [
            'maba' => $maba,
            'qr' =>  'data:image/svg+xml;base64,' . base64_encode($qr)

        ]);
        return $pdf->download('formulir-' . $maba->no_reg . '.pdf');
    }
}
