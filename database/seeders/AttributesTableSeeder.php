<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Attribute;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attribute::create([
            'code' => 'size',
            'name' => 'Size',
            'frontend_type' => 'select',
            'is_filterable' => 1,
            'is_required' => 1
        ]);

        Attribute::create([
            'code' => 'color',
            'name' => 'Color',
            'frontend_type' => 'select',
            'is_filterable' => 1,
            'is_required' => 1
        ]);
    }
}