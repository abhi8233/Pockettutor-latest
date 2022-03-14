<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\EmailTemplate;

class superadminApproveDocOfTutor extends Mailable
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
		
		$templatesEmail = EmailTemplate::where('tag_name','approve-document')->where('role','SuperAdmin')->first();
        // return $this->view('mail.superadminApproveDocOfTutor')->with(['user'=>$this->user,'html'=>]);
		return $this->view('mail.subscriptionPlan')->subject($templatesEmail->subject)->with(['user'=>$this->user,'html'=>$templatesEmail]);
    }
}
