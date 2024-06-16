<?php

namespace App\Http\Controllers\web\Client;

use App\Contracts\ClientContract;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected ClientContract $client;

    public function __construct(ClientContract $client)
    {
        $this->client = $client;
    }

    public function index(): Renderable
    {
        $id = auth()->user()->id;

        $client = $this->client->findById($id);

        return view('client.profile.profile' , compact('client'));
    }

    public function updatePass(){

    }

    public function updateProfile(){
        
    }
}
