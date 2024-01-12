<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $new_pass;

    public function __construct($new_pass)
    {
        $this->new_pass  = $new_pass;
    }

    public function build()
    {
        return $this->view('admin.mails.getNewPassword', [
            'new_pass' => $this->new_pass
        ]);
    }
}
