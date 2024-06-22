<?php

namespace App\Repositories;

use App\Contracts\ClientContract;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ClientRepository extends BaseRepository implements ClientContract {

    protected User $user;

    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function create(array $data)
    {

    }

    public function update($user , array $data)
    {
        $client = $this->findById($user);

        $client->update($data);
    }

    public function destroy($id)
    {

    }

    public function updatePass($user , $data){

        $client = $this->findById($user);

        $client->password = Hash::make($data["password"]);
        
        $client->save();
    }

}