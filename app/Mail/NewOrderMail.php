<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $order;
    public $shippingAddress;
    public $orderProducts;
    public $user;

    public function __construct($orderInformation)
    {
        $this->order = $orderInformation['order'];
        $this->shippingAddress = $orderInformation['shippingAddress'];
        $this->orderProducts = $orderInformation['orderProducts'];
        $this->user = $orderInformation['user'];
    }


    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: "Nice choice! Your order " . $this->order['id'] . " is confirmed",
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.new_order',
            with: [
                'user' => $this->user,
                'order' => $this->order,
                'orderProducts' => $this->orderProducts,
                'shippingAddress' => $this->shippingAddress,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}