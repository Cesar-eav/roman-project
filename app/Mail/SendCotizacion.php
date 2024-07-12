<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCotizacion extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfPath;
    public $data;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdfPath, $data)
    {
        $this->pdfPath = $pdfPath;
        $this->data = $data;


    }
    

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Cotización')
            ->view('emails.pdf_view_send')
            ->attach($this->pdfPath, [
                'as' => 'invoice.pdf',
                'mime' => 'application/pdf'
            ])
            ->with('data', $this->data);
    }
}
