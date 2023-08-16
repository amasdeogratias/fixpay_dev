<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Contracts\BrandContract;
use App\Contracts\CategoryContract;
use App\Contracts\ProductContract;
use App\Http\Controllers\BaseController;

class ProductController extends BaseController
{
    protected $brandRepository;
    protected $categoryRepository;
    protected $productRepository;

    public function __construct(BrandContract $brandRepository, CategoryContract $categoryRepository, ProductContract $productRepository)
    {
        $this->brandRepository    = $brandRepository;
        $this->categoryRepository = $categoryRepository;
        $this->productRepository  = $productRepository;
    }

    //list products
    public function index()
    {
        $products = $this->productRepository->listProducts();

        $this->setPageTitle('Products', 'Products List');
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $brands = $this->brandRepository->listBrands('name', 'asc');
        $categories = $this->categoryRepository->listCategories('name', 'asc');

        $this->setPageTitle('Products', 'Create Product');
        return view('admin.products.create', compact('categories', 'brands'));

    }
}
