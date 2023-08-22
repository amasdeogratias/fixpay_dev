<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\CategoryContract;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function show($slug)
    {
        $category = $this->categoryRepository->findBySlug($slug);
        dd($category);
        return view('site.pages.category', compact('category'));
    }
}
