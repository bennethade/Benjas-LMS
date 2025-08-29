<?php

namespace App\Repositories;

use App\Models\Category;
use \App\Traits\FileUploadTrait;

class CategoryRepository
{
    use FileUploadTrait;

    public function saveCategory(array $data, $image)
    {
        // dd($data, $image);

        $category = new Category();

        //Handle file upload
        if ($image) {
            // $data['image'] = $this->uploadFile($image, 'category', $image ? $category->image : null);
            $data['image'] = $this->uploadFile($image, 'category', $category->image);
        }

        $category->create($data);
        return $category;
    }

    public function updateCategory(array $data, $image, $id)
    {
        $category = Category::findOrFail($id);

        //Handle file upload
        if ($image) {
            // $data['image'] = $this->uploadFile($image, 'category', $image ? $category->image : null);
            $data['image'] = $this->uploadFile($image, 'category', $category->image);
        }

        $category->update($data);
        return $category;
    }

    
}   