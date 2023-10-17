<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripePaymentService
{
    protected $stripeSecretKey;

    public function __construct()
    {
        $this->stripeSecretKey = config('services.stripe.secret_key');
        Stripe::setApiKey($this->stripeSecretKey);

    }



    public function processPayment($order)
    {
        Stripe::setApiKey(config('services.stripe.secret_key'));
        $items = array();

        $lineItems = [];
        foreach($order->items as $item){
            $lineItems[] = [
                'price_data' => [
                    'currency'     => 'TZS',
                    'product_data' => [
                        "name" => $item->product->name,
                    ],
                    'unit_amount'  => 100 *($item->product->price),
                ],
                'quantity'   => $item->quantity,
            ];
        }
        // dd($lineItems);

        try {
            $session = Session::create([
                'line_items'  => $lineItems,
                'mode'        => 'payment',
                'success_url' =>  route('checkout.payment.complete', ["order_number" => $order['order_number']]),
                'cancel_url'  =>  route('checkout.index'),
            ]);
            return redirect()->away($session->url)->send();

        }catch(\Excepiton $e){
            return redirect()->back()->with('message', 'Payment processing failed: ' . $e->getMessage());
        }
    }

}
