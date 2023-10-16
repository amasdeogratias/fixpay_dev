<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Services\StripePaymentService;
// use App\Services\AzamPaymentService;

class CheckoutController extends Controller
{
    protected $orderRepository;
    protected $mobilePayment;

    public function __construct(OrderContract $orderRepository, StripePaymentService $mobilePayment)
    {
        $this->orderRepository = $orderRepository;
        $this->mobilePayment = $mobilePayment;
    }

    public function getCheckout()
    {
        return view('site.pages.checkout');
    }

    public function placeOrder(Request $request)
    {
        $validator =$request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'post_code' => 'required',
            'phone_number' => 'required',
            'notes' => 'required'
        ]);
        // dd($validator);
        $order = $this->orderRepository->storeOrderDetails($validator);
        // dd($order);

        if(!$order){
            return redirect()->back()->with('message','Order not placed');
        }

        $this->mobilePayment->processPayment($order);

    }

    public function success()
    {
        return "Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible";
    }
}
