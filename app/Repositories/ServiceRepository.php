<?php

namespace App\Repositories;

use App\Contracts\ServiceContract;
use App\Models\Service;
use App\Models\ServiceGalery;
use App\Services\FileUploadService;

class ServiceRepository implements ServiceContract{

    protected Service $service;
    protected ServiceGalery $galery;
    protected FileUploadService $uploadService;

    public function __construct(
        Service $service,
        ServiceGalery $galery,
        FileUploadService $uploadService
    ) {
        $this->service = $service;
        $this->galery = $galery;
        $this->uploadService = $uploadService;
    }

    public function findById($id)
    {
        return $this->service->findOrFail($id);
    }

    public function getAll(){
        
        return $this->service->all();
    }
    public function findByAttribute(){}

    public function create(array $data)
    {
        $service = $this->service->create($data);

        if(array_key_exists( 'images' , $data)){
            $path = 'files/services';
            $this->uploadService->uploadMulTyImg($data["images"],$path ,$service);
        }

        return $service;
    }

    public function update($model, array $data)
    {
        $service = $this->findById($model->id);

        if(array_key_exists( 'images' , $data)){
            $path = 'files/services';
            $this->uploadService->UpdateUploadedFiles($data["images"], $path , $service);
        }

        $service->update($data);

        return $service;
    }

    public function destroy($model)
    {
        $service = $this->findById($model);

        $this->uploadService->removeImages($service);

        $service->delete();
    }


}