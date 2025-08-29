<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubcategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Services\SubCategoryService;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    protected $subCategoryService;


    public function __construct(SubCategoryService $subCategoryService)
    {
        $this->subCategoryService = $subCategoryService;
    }

    public function index()
    {
        // $allSubcategories = SubCategory::orderBy('name', 'asc')->get();
        $allSubcategories = SubCategory::with('category')->orderBy('name', 'asc')->get();
        return view('backend.admin.subcategory.index', compact('allSubcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCategories = Category::orderBy('name', 'asc')->get();
        return view('backend.admin.subcategory.create', compact('allCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SubcategoryRequest $request)
    {
        //Pass data and files to the service
        $this->subCategoryService->saveSubCategory($request->validated());

        return redirect()->back()->with('success', 'Subcategory created successfully.');
    
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
        $subcategory = SubCategory::findOrFail($id);
        $allCategory = Category::orderBy('name', 'asc')->get();
        return view('backend.admin.subcategory.edit', compact('subcategory', 'allCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryRequest $request, string $id)
    {
        //Pass data and files to the service
        $this->subCategoryService->updateSubCategory($request->validated(), $id);

        return redirect()->back()->with('success', 'Subcategory updated successfully.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        SubCategory::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Subcategory deleted successfully.');    
    }

}
