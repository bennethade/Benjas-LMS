<?php

namespace App\Repositories;

use App\Models\SubCategory;

class SubCategoryRepository
{
    public function saveSubCategory(array $data)
    {
        // dd($data, $image);

        $subcategory = new SubCategory();

        $subcategory->create($data);
        return $subcategory;
    }

    public function updateSubCategory(array $data, $id)
    {
        $subcategory = SubCategory::findOrFail($id);

        $subcategory->update($data);
        return $subcategory;
    }

    
}   