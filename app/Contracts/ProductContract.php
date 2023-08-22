<?php

namespace App\Contracts;

interface ProductContract
{
    //list all products
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    //find product by id
    public function findProductById(int $id);

    //create product
    public function createProduct(array $params);

    //update product
    public function updateProduct(array $params);

    //delete product
    public function deleteProduct($id);
    
    //find product by slug
    public function findProductBySlug($slug);
}
