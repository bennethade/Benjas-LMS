<?php

namespace App\Repositories;

use App\Models\Slider;
use \App\Traits\FileUploadTrait;

class SliderRepository
{
    use FileUploadTrait;

    public function saveSlider(array $data, $image)
    {
        // dd($data, $image);

        $slider = new Slider();

        //Handle file upload
        if ($image) {
            // $data['image'] = $this->uploadFile($image, 'slider', $image ? $slider->image : null);
            $data['image'] = $this->uploadFile($image, 'slider', $slider->image);
        }

        $slider->create($data);
        return $slider;
    }

    public function updateSlider(array $data, $image, $id)
    {
        $slider = Slider::findOrFail($id);

        //Handle file upload
        if ($image) {
            // $data['image'] = $this->uploadFile($image, 'slider', $image ? $slider->image : null);
            $data['image'] = $this->uploadFile($image, 'slider', $slider->image);
        }

        $slider->update($data);
        return $slider;
    }

    
}   