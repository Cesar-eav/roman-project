<?php
namespace App\Http\Controllers;
use App\Mail\SendCotizacion;
use App\Models\FormV1Liviano;
use Illuminate\Support\Facades\Mail;
use PDF;

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
        
        $pdfContent = $pdf->output();

        // Enviar el correo con el PDF adjunto
        Mail::to('destinatario@example.com')->send(new SendCotizacion($data, $pdfContent));

        return response()->json(['message' => 'Correo de cotización enviado con archivo adjunto!']);
    }
}
