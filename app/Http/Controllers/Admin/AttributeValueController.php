<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\AttributeContract;
use App\Models\AttributeValue;

class AttributeValueController extends Controller
{
    protected $attributeRepository;

    public function __construct(AttributeContract $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    //get all attributes values by id
    public function getValues(Request $request)
    {
        $attributeId = $request->input('id');
        $attribute = $this->attributeRepository->findAttributeById($attributeId);

        $values = $attribute->values; //return all attributes values associated with attribute id/model
        return response()->json($values);
    }
}
