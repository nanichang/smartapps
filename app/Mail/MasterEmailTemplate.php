<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MasterEmailTemplate extends Mailable
{
    use Queueable, SerializesModels;

    public $params;
    public $subject;
    public $from_email;
    public $from_name;
    public $template;
    public $template_type;
    public $data;
    /**
     * Create a new message instance.
     */
    public function __construct(array $params)
    {
        $this->params        = $params;
        $this->data          = isset($this->params['data']) ? $this->params['data'] : '';
        $this->subject       = isset($this->params['subject']) ? $this->params['subject'] : '';
        $this->from_email    = isset($this->params['from_email']) ? $this->params['from_email'] : 'noreply@smartapps.com';
        $this->from_name     = isset($this->params['from_name']) ? $this->params['from_name'] :'EXAMPLE';
        $this->template     =  $this->params['template'];
        $this->template_type = isset($this->params['template_type']) ? $this->params['template_type'] : 'view';
    }

    /**
     * Get the message envelope.
     */
    public function build() {
        if ($this->template_type == 'view') {

            return $this->view($this->template)
                ->from($this->from_email, $this->from_name)
                ->with('data', $this->data);
        }
        else {
            return $this->markdown($this->template)
                ->from($this->from_email, $this->from_name)
                ->with('data', $this->data)
                ->subject($this->subject);
        }
    }

    
}
