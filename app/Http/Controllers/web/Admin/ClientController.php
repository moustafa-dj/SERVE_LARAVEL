<?php

namespace App\Http\Controllers\web\Admin;

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
        $clients = $this->client->getAll();
        return view('admin.client.index' ,compact('clients'));
    }
}
