<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmOTP extends Mailable
{
    use Queueable, SerializesModels;

    protected $random_number;
    public function __construct($random_number)
    {
        $this->random_number = $random_number;
    }

    public function build()
    {
        return $this->view('admin.mails.getOTP', [
            'random_number' => $this->random_number
        ]);
    }
}
