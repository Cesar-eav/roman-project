<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class PDFMail extends Mailable
{
    use Queueable, SerializesModels;

    public $path;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.pdf')
                    ->subject('Aquí está tu archivo PDF')
                    ->attach(Storage::path($this->path), [
                        'as' => 'archivo.pdf',
                        'mime' => 'application/pdf',
                    ]);
    }
}