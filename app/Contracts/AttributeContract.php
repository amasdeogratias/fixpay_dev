<?php

namespace App\Contracts;

interface AttributeContract
{
    //create interface for listing all attributes
    public function listAttributes(string $order = 'id', string $sort ='desc', array $columns = ['*']);

    //find attribute by id
    public function findAttributeById(int $id);

    //create attribute
    public function createAttribute(array $params);

    //update attribute
    public function updateAttribute(array $params);

    //delete attribute by id
    public function deleteAttribute($id);
}
