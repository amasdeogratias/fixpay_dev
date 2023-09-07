<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Contracts\AttributeContract;
use Cart;



class ProductController extends Controller
{
    protected $productRepository;
    protected $attributeRepository;
    public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);
        $attributes = $this->attributeRepository->listAttributes();

        return view('site.pages.product', compact('product', 'attributes'));
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('productId');
        $product = $this->productRepository->findProductById($productId);
        $options = $request->except('_token', 'productId', 'price', 'qty');

        $cartItems = \Cart::getContent()->toArray();
        if(!empty($cartItems))
        {
            foreach($cartItems as $item){
                if ($item['id'] == $productId) {
                    Cart::update($productId, array(
                        'quantity' => $request->input('qty')
                    ));

                    return redirect()->back()->with('message', 'Quantity updated in cart.');
                }
            }
        }

        Cart::add($productId,
            $product->name,
            $request->input('price'),
            $request->input('qty'),
            $options);

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }
}
