<?php

namespace App\Repositories;

use App\Models\Brand;
use App\Traits\Uploadable;
use Illuminate\Http\UploadedFile;
use App\Contracts\BrandContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

class BrandRepository extends BaseRepository implements BrandContract
{
    use Uploadable;

    public function __construct(Brand $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    //return all brands
    public function listBrands(string $order = 'id', string $sort='desc', array $columns= ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    //find brand by id
    public function findBrandById(int $id)
    {
        try{
            return $this->findOneOrFail($id);

        }catch(ModelNotFoundException $e){
            throw new ModelNotFoundException($e);
        }
    }

     //create brand
     public function createBrand(array $params)
     {
        try{
            $logo = null;
            $collection = collect($params);
            if($collection->has('logo') && ($params['logo'] instanceof UploadedFile)){
                $logo = $this->uploadOne($params['logo'], 'brands');
            }

            $merge = $collection->merge(compact('logo'));
            $brand = new Brand($merge->all()); //merge all data in Brand model
            $brand->save();
            return $brand;

        }catch(QueryException $e){
            throw new InvalidArgumentException($e->getMessage());
        }
    }

    //update brand data by id
    public function updateBrand(array $params)
    {
        $brand = $this->findBrandById($params['id']);
        $collection = collect($params)->except('_token');

        if ($collection->has('logo') && ($params['logo'] instanceof  UploadedFile)) {

            if ($brand->logo != null) {
                $this->deleteOne($brand->logo);
            }

            $logo = $this->uploadOne($params['logo'], 'brands');
        }

        $merge = $collection->merge(compact('logo'));
        $brand->update($merge->all());
        return $brand;
    }

    //delete brand by id
    public function deleteBrand($id)
    {
        $brand = $this->findBrandById($id);

        if ($brand->logo != null) {
            $this->deleteOne($brand->logo);
        }
        $brand->delete();
        return $brand;
    }
}
