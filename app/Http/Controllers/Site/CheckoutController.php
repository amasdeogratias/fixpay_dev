<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use App\Services\StripePaymentService;
use App\Models\Order;
use Cart;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Checkout\Session;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    public function complete(Request $request)
    {
        // Stripe::setApiKey(config('services.stripe.secret_key'));
        // $sessionId = $request->get('session_id');
        $order_number = $request->get('order_number');
        // dd($order_number);

        try {
            
            if (!$order_number) {
                throw new NotFoundHttpException;
            }

            $order = Order::where('order_number', $order_number)->first();
            if (!$order) {
                throw new NotFoundHttpException();
            }
            if ($order->status === 'pending') {
                $order->status = 'completed';
                $order->payment_status = 1;
                $order->payment_method = "stripe";
                $order->save();
            }

            Cart::clear();
            return view('site.pages.success',compact('order'));
        } catch (\Exception $e) {
            throw new NotFoundHttpException();
        }

    }
}
