<?php

namespace App\Repositories;

use App\Models\Product;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\ProductContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class ProductRepository extends BaseRepository implements ProductContract
{
    use UploadAble;

    public function __construct(Product $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    //list products
    public function listProducts(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    //find product by id
    public function findProductById(int $id)
    {
        try{
            return $this->findOneOrFail($id);

        }catch(ModelNotFoundException $e){
            throw new ModelNotFoundException($e);
        }
    }

    //create product
    public function createProduct(array $params)
    {
        try{


            $collection = collect($params);

            $featured = $collection->has('featured') ? 1 : 0;
            $status   = $collection->has('status') ? 1 : 0;

            $merge = $collection->merge(compact('featured', 'status'));
            $product = new Product($merge->all());
            $product->save();

            if($collection->has('categories'))
            {
                $product->categories()->sync($params['categories']);
            }

            return $product;

        }catch(QueryException $e){
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    //update product by id
    public function updateProduct(array $params)
    {
        $product = $this->findProductById($params['product_id']);
        $collection = collect($params)->except('_token');

        $featured = $collection->has('featured') ? 1 : 0;
        $status   = $collection->has('status') ? 1 : 0;

        $merge = $collection->merge(compact('featured', 'status'));
        $product->update($merge->all()); //update by product id

        if($collection->has('categories'))
        {
            $product->categories()->sync($params['categories']);
        }

        return $product;
    }

    //delete product by id
    public function deleteProduct($id)
    {
        $product = $this->findProductById($id);
        $product->delete();
        return $product;
    }
    
    //find product by slug
    public function findProductBySlug($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return $product;
    }


}
