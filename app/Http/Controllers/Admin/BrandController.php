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

    //create function to display brand create form
    public function create()
    {
        $this->setPageTitle('Brands', 'Create Brand');
        return view('admin.brands.create');
    }

    //store brands in the database
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'logo' => 'mimes:png,jpg, jpeg'
        ]);

        $params = $request->except('_token');
        // dd($params);
        $brand = $this->brandRepository->createBrand($params);
        if(!$brand){
            return $this->responseRedirectBack('Error occured while creating Brand', 'error', true, true);
        }
        return $this->responseRedirect('admin.brands.create', 'Brands added successfully', 'success', false, false);
    }
}
