<?php

namespace App\Http\Controllers;

use App\Mail\SendCotizacion;
use App\Models\FormV1Liviano;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class MailController extends Controller
{
    public function sendCotizacion($id)
    {

        $cotizacion = FormV1Liviano::with(['ejecutivas','cias'])
        ->where('id', $id)
        ->first();
        $data = [
            'title' => 'Vehículo motorizado liviano',
            'cotizacion' => $cotizacion
        ];
        $pdf = PDF::loadView('pdf_view', $data);
        // Guardar el PDF temporalmente en almacenamiento local
        $pdfPath = storage_path('app/public/invoice.pdf');
        $pdf->save($pdfPath);

        // Enviar el correo con el PDF adjunto
        Mail::to('destinatario@example.com')->send(new SendCotizacion($pdfPath, $data));
      
        unlink($pdfPath);

        // return 'Invoice sent!';



        return response()->json(['message' => 'Correo de cotización enviado con archivo adjunto!']);
    }
}
