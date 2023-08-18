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

    //add new attributes values
    public function addValues(Request $request)
    {
        $request->validate([
            'value' => 'required',
            'price' => 'required',
        ]);
        try{
            $value = new AttributeValue();
            $value->attribute_id = $request->input('id');
            $value->value = $request->input('value');
            $value->price = $request->input('price');
            $value->save();

            return response()->json($value);
        }catch(\Exception $e){
            return response()->json(['Error' => 'Error occured while creating attributes'.$e->getMessage()], 500);
        }

    }

    //update attribute value
    public function updateValues(Request $request)
    {
        $attributeValue = AttributeValue::findOrFail($request->input('valueId'));
        $attributeValue->attribute_id = $request->input('id');
        $attributeValue->value = $request->input('value');
        $attributeValue->price = $request->input('price');
        $attributeValue->save();

        return response()->json($attributeValue);
    }

    public function deleteValues(Request $request)
    {
        $attributeValue = AttributeValue::findOrFail($request->input('id'));
        $attributeValue->delete();

        return response()->json(['status' => 'success', 'message' => 'Attribute value deleted successfully.']);
    }
}