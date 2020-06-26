<?php

namespace App\Mail\Orders;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@foodbroker.rs', 'FoodBroker-Admin')
            ->subject("Nova Porudžbenica")
            ->markdown('dashboard.email.send-waiting')
            ->with([
                'name'    => $this->data['name'],
                'subject' => $this->data['subject'],
                'content' => $this->data['content'],
                'link'    => 'http://foodbroker.test',
            ]);   
    }
}
