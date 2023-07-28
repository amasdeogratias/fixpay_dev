<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\BrandContract;

class BrandController extends BaseController
{
    protected $brandRepository;

    public function __construct(BrandContract $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    //list of all brands
    public function index()
    {
        $brands = $this->brandRepository->listBrands();
        $this->setPageTitle('Brands', 'list of all brands');
        return view('admin.brands.index', compact('brands'));
    }
}
