<?php

namespace App\Repositories;

use App\Models\Category;
use App\Contracts\CategoryContract;

class CategoryRepository extends BaseRepository implements CategoryContract
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function listCategories(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    public function treeList()
    {
        return Category::orderByRaw('-name ASC')
                ->get();
                // ->nest()
                // ->setIndent('|-- ')
                // ->listFlattened('name');
    }

    public function createCategory(array $params)
    {
        try{
            $collection = collect($params);

            $image = null;
            if($collection->has('image') && ($params['image'] instanceof UploadedFile)){
                $image = $this->uploadOne($params['image'], 'categories');
            }

            $featured = $collection->has('featured') ? 1 : 0;
            $menu = $collection->has('menu') ? 1 : 0;

            $merge = $collection->merge(compact('menu', 'image', 'featured'));
            $category = new Category($merge->all());

            $category->save();
            return $category;

        }catch(QueryException $e){
            throw new InvalidArgumentException($e->getMessage());
        }
    }
}
