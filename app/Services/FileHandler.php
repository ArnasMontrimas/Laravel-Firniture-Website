<?php

namespace App\Services;

class FileHandler {
    static function validateFile($request) {
        $imageToStore = 'noimage.jpg';

        //Handle uploaded file
        if($request->hasFile('productImage')) {
            if($request->file('productImage')->isValid()) {
                //Full image name with extension
                $imageFull = $request->file('productImage')->getClientOriginalName();

                //Image name extracted to variable
                $imageName = pathinfo($imageFull, PATHINFO_FILENAME);

                //Image extension extracted to variable
                $imageExt = $request->productImage->extension();

                //Image name which we will store
                $imageToStore = $imageName.'_'.time().'.'.$imageExt;

                //Store file in storage
                $path = $request->productImage->storeAs('storage/images/', $imageToStore);
            }
        }

        return $imageToStore;
    }

    static function deleteOldFile($product) {
        //Delete Old File
        if(file_exists(storage_path("storage/images/$product->img")) && $product->img != 'noimage.jpg') {
            unlink(storage_path("storage/images/$product->img"));
        }
    }

}