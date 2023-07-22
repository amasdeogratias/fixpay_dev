<?php
namespace App\Contracts;

interface CategoryContract
{
    public function listCategories(string $order = 'id', string $sort='desc', array $columns=['*']);

    public function treeList(); //return view category

    // public function findCategoryById(int $id);

    // public function createCategory(array $params);
}
