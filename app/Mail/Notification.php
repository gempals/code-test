<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    //private $value_par;

    public $mailType;
    public $requestData;
    public $replyData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dataMail)
    {
        $this->mailType = $dataMail['mailType'];
        if($this->mailType == 1){
            $this->requestData = $dataMail;
        }else{
            $this->replyData = $dataMail;
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */   
    public function build()
    {
        if($this->mailType == 1){
            return $this->view('emails.request');
        }else if ($this->mailType == 2){
            return $this->view('emails.reply');
        }else{
            return $this->view('emails.test');
        }
    }
}
