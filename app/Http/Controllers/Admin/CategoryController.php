<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\BaseController;
use App\Contracts\CategoryContract;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends BaseController
{
    protected $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->categoryRepository->listCategories();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->categoryRepository->treeList();
        $this->setPageTitle('Categories', 'Create Category');
        return view('admin.categories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:191',
            'parent_id' => 'required|not_in:0',

        ]);

        $params = $request->except('_token');
        $category = $this->categoryRepository->createCategory($params);

        if(!$category){
            return $this->responseRedirectBack('Error occurred while creating category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.categories.index', 'Category added successfully' ,'success',false, false);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $targetCategory = $this->categoryRepository->findCategoryById($id);
        $categories = $this->categoryRepository->treeList();
        $this->setPageTitle('Categories', 'Edit Category: '.$targetCategory->name);
        return view('admin.categories.edit',compact('categories', 'targetCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
