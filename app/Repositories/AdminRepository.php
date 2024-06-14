<?php

namespace App\Repositories;

use App\Contracts\AdminContract;
use App\Models\Admin;
use App\Enums\Domain\Status;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Hash;

class AdminRepository implements AdminContract {

    protected Admin $admin;
    protected FileUploadService $upload_service;

    public function __construct(
        Admin $admin,
        FileUploadService $upload_service
    )
    {
        $this->admin = $admin;
        $this->upload_service = $upload_service;
    }

    public function findById($id)
    {
        return $this->admin->findOrFail($id);
    }

    public function getAll(){
        
        return $this->admin->all();
    }

    public function findByAttribute()
    {
        
    }

    public function create(array $data)
    {
        
    }

    public function update($model, array $data)
    {
        $admin = $this->findById($model);

        if(array_key_exists('image' , $data)){
            $path = 'files/admin/profile';
            $this->upload_service->uploadProfileImg($data["image"],$path,$admin);
            $data["image"] = $admin->image;
        }

        $admin->update($data);
    }

    public function destroy($model)
    {
        
    }

    public function removeImg($model){
        $this->upload_service->removeProfileImg($model);
    }

    public function updatePass($model , $data){

        $admin = $this->findById($model);

        $admin->password = Hash::make($data["password"]);
        
        $admin->save();
    }

}