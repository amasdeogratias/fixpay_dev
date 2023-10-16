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
        try {
            $session = Session::create([
                'line_items'  => [
                    [
                        'price_data' => [
                            'currency'     => 'USD',
                            'product_data' => [
                                "name" => $order['order_number'],
                            ],
                            'unit_amount'  => $order['grand_total'],
                        ],
                        'quantity'   => $order['item_count'],
                    ],

                ],
                'mode'        => 'payment',
                'success_url' =>  Route::has('success') ? route('success') : '',
                'cancel_url'  => Route::has('checkout.index') ? route('checkout.index') : '',
            ]);
            // dd($session->url);
            return redirect()->away($session->url)->send();
            // $charge = Charge:: create([
            //     "amount" => 20,
            //     'currency' => 'TZS',
            //     'source' => $this->stripeSecretKey,
            //     'description' => 'Example Charge',
            // ]);

        }catch(\Excepiton $e){
            return redirect()->back()->with('message', 'Payment processing failed: ' . $e->getMessage());
        }
    }
}
