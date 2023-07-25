<?php
namespace App\Contracts;

interface CategoryContract
{
    public function listCategories(string $order = 'id', string $sort='desc', array $columns=['*']);

    public function treeList(); //return view category


    public function createCategory(array $params);

    public function findCategoryById(int $id);

    public function updateCategory(array $params);

    public function deleteCategory($id);
}
