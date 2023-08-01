<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Contracts\AttributeContract;

class AttributeController extends BaseController
{
    protected $attributeRepository;

    public function __construct(AttributeContract $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    public function index()
    {
        $attributes = $this->attributeRepository->listAttributes();
        $this->setPageTitle('Attributes', 'List of Attributes');
        return view('admin.attributes.index', compact('attributes'));
    }

    public function create()
    {
        $this->setPageTitle('Attributes', 'Create Attribute');
        return view('admin.attributes.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'frontend_type' => 'required'
        ]);

        $params= $request->except('_token');
        $attribute = $this->attributeRepository->createAttribute($params);
        if (!$attribute) {
            return $this->responseRedirectBack('Error occurred while creating attribute.', 'error', true, true);
        }
        return $this->responseRedirect('admin.attributes.create', 'Attribute added successfully' ,'success',false, false);
    }
}
