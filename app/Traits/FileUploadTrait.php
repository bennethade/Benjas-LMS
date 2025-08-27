<?php

namespace App\Traits;


trait FileUploadTrait
{
    public function uploadFile($file, $folder, $existingFile = null)
    {
        if($file){
            //Define the target folder
            // $targetFolder = public_path('uploads/' . $folder);
            $targetFolder = public_path("uploads/{$folder}");

            //Ensure the folder exists
            if (!file_exists($targetFolder)) {
                mkdir($targetFolder, 0755, true);
            }

            //Delete existing file if exists
            // if ($existingFile && file_exists(public_path($existingFile))) {
            if ($existingFile && file_exists(public_path(parse_url($existingFile, PHP_URL_PATH)))) {
                // unlink(public_path($existingFile));
                unlink(public_path(parse_url($existingFile, PHP_URL_PATH)));
            }

            //Generate a unique filename
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            //Move the file to the target folder
            $file->move($targetFolder, $filename);

            //Return the public url
            return url("uploads/{$folder}/{$filename}");
        }

        return $existingFile; // Return existing file path if no new file is uploaded
    }


}