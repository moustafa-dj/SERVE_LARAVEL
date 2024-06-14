<?php

namespace App\Services;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Models\Model;

class FileUploadService{


    public function uploadMulTyImg(array $files , string $directory , $model)
    {
        foreach($files as $file){
            if($file instanceof UploadedFile){
                $img = $file->store($directory);
                $model->images()->create(['img'=>$img]);
            }
        }

        return $model;
    }

    public function UpdateUploadedFiles(array $files , string $directory , $model)
    {
        foreach($model->images as $img){
            Storage::delete($img->img);
            $img->delete();
        }
         return $this->uploadMulTyImg($files , $directory , $model);
    }

    public function removeImages($model){
        foreach($model->images as $img){
            Storage::delete($img->img);
            $img->delete();
        }
    }

    public function uploadProfileImg($file ,$directory, $model){

        if($file instanceof UploadedFile){

            if($model->image != null){
                Storage::delete($model->image);
            }
            
            $profile_image = $file->store($directory);

            $model->image = $profile_image;

        }
        return $model;
    }

    public function removeProfileImg($model){
        if($model->image != null){
            Storage::delete($model->image);
            $model->image = null;
            $model->save();
        }
    }
}