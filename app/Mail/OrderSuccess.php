<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderSuccess extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.order_success')
        ->subject('Đặt hàng thành công')
        ->with([
            'orderCode' => $this->order->order_code,
            'deliveryAddress' => $this->order->delivery_address,
            'deliveryPhone' => $this->order->delivery_phone,
            'note' => $this->order->note,
            'orderDetails' => $this->order->orderDetails, // Lấy chi tiết đơn hàng
        ]);
    }
}
