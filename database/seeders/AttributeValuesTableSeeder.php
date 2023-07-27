<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AttributeValue;


class AttributeValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //define available attributes
        $sizes = ['small', 'medium', 'large'];
        $colors = ['black', 'blue', 'red', 'orange'];

        //create attribute value for sizes
        foreach($sizes as $key => $value)
        {
            AttributeValue::create([
                'attribute_id' => 1,
                'value'      => $value,
                'price'      => null,
            ]);
        }

        //create attribute values for colors
        foreach($colors as $key => $color)
        {
            AttributeValue::create([
                'attribute_id' => 2,
                'value'      => $color,
                'price'      => null,
            ]);
        }
    }
}
