<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\EmailTemplate;

class NotifyUserRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
         $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('mail.userregister')->with('user',$this->user);
		$templatesEmail = EmailTemplate::where('tag_name','user-register')->where('role','SuperAdmin')->first();
        return $this->view('mail.subscriptionPlan')->subject($templatesEmail->subject)->with(['user'=>$this->user,'html'=>$templatesEmail]);
    }
}
