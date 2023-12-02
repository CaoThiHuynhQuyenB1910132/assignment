<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    protected Order $order;
    protected $orderProducts;

    public function __construct(Order $order, $orderProducts)
    {
        $this->order = $order;
        $this->orderProducts = $orderProducts;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'client.email.order-email',
            with: [
                'shippingAddress' => $this->order->shipping_address,
                'total' => $this->order->total,
                'trackingNumber' => $this->order->tracking_number,
                'notes' => $this->order->notes,
                'status' => $this->order->status,
                'orderProducts' => $this->orderProducts,
            ],
        );
    }
}
