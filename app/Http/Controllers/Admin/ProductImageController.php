<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UploadAble;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;

class ProductImageController extends Controller
{
    use UploadAble;

    protected $productRepository;
    public function __construct(ProductContract $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    //upload image
    public function upload(Request $request)
    {
        $product = $this->productRepository->findProductById($request->product_id);
        if($request->has('image')){
            $image = $this->uploadOne($request->image, 'products');

            $productImage = new ProductImage([
                'full'      =>  $image,
            ]);

            $product->images()->save($productImage);
        }
        return response()->json(['status' => 'Success']);
    }
}
