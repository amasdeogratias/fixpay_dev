<?php

namespace App\Contracts;

interface BrandContract
{
    //list brands
    public function listBrands(string $order = 'id', string $sort='desc', array $columns= ['*']);

    //find brand by id
    public function findBrandById(int $id);

    //create brand
    public function createBrand(array $params);

    //update brand
    public function updateBrand(array $params);

    //delete brand
    public function deleteBrand($id);
}
