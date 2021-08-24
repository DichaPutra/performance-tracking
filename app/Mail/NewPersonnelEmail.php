<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class NewPersonnelEmail extends Mailable {

    use Queueable,
        SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $details;
    
    public function __construct($details)
    {
        // $details = array
        //'name'
        //'email' 
        //'password' 
        //'company_name'
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@crowe-performancetracking.com', 'Crowe Performance Tracking')
                        ->subject('You has been invited as Personnel')
                        ->markdown('mails.newpersonnel')
                        ->with([
                            'name' => $this->details['name'],
                            'email' => $this->details['email'],
                            'password' => $this->details['password'],
                            'company_name' => $this->details['company_name'],
                            'link' => URL::to('/login')
        ]);
        //return $this->view('view.name');
    }

}
