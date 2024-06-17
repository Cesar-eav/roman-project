<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\PDFMail;

class PolizaController extends Controller
{
    public function crearCotizacion()
    {

        return Inertia::render('CrearCotizacion');
    }

    public function uploadPDF(Request $request)
    {
        $request->validate([
            'pdfs' => 'required|array',
            'pdf' => 'required|mimes:pdf|max:2048', // Validación del archivo PDF
            'emails' => 'required|json', // Validación de la lista de correos

        ]);

        $uploadedFiles = [];

        // Subir cada archivo al almacenamiento
        foreach ($request->file('pdfs') as $pdf) {
            $path = $pdf->store('pdfs');
            $uploadedFiles[] = $path;
        }

        // Obtener la lista de correos electrónicos
        $emails = json_decode($request->input('emails'), true);

        // Guardar la ruta del archivo en la sesión para su posterior uso
        $request->session()->put('pdf_path', $path);

        // Enviar el correo a cada compañía seleccionada
        foreach ($emails as $email) {
            Mail::to($email)->send(new PDFMail($path));
        }

        return response()->json(['message' => 'Archivo PDF subido y correos enviados correctamente.']);
    }

    public function sendEmail(Request $request)
    {
        // Recuperar la ruta del archivo desde la sesión
        $path = $request->session()->get('pdf_path');

        if ($path) {
            // Enviar el correo
            Mail::to('destinatario@example.com')->send(new PDFMail($path));

            return "Correo enviado con éxito.";
        }

        return "No se encontró el archivo PDF.";
    }
}
