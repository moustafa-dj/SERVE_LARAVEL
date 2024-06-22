<?php

namespace App\Repositories;

use App\Contracts\ServiceContract;
use App\Models\Service;
use App\Models\ServiceGalery;
use App\Services\FileUploadService;

class ServiceRepository extends BaseRepository implements ServiceContract{

    protected Service $service;
    protected ServiceGalery $galery;
    protected FileUploadService $uploadService;

    public function __construct(
        Service $service,
        ServiceGalery $galery,
        FileUploadService $uploadService
    ) {
        $this->galery = $galery;
        $this->uploadService = $uploadService;
        parent::__construct($service);
    }

    public function create(array $data)
    {
        $service = $this->service->create($data);

        if(array_key_exists( 'images' , $data)){
            $path = 'files/services';
            $this->uploadService->uploadMulTyImg($data["images"],$path ,$service);
        }

        return $service;
    }

    public function update($service, array $data)
    {
        $service = $this->findById($service->id);

        if(array_key_exists( 'images' , $data)){
            $path = 'files/services';
            $this->uploadService->UpdateUploadedFiles($data["images"], $path , $service);
        }

        $service->update($data);

        return $service;
    }

    public function destroy($service)
    {
        $service = $this->findById($service);

        $this->uploadService->removeImages($service);

        $service->delete();
    }


}