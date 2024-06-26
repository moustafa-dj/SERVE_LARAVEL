<?php

namespace App\Http\Controllers\web\Admin;

use App\Contracts\ClientContract;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class ClientController extends Controller 
{
    protected ClientContract $client;

    public function __construct(ClientContract $client)
    {
        $this->client = $client;
    }

    public static function middleware():array
    {
        return [
            'role_or_permission:admin',
            new Middleware(PermissionMiddleware::using(
                'view-list-client'), only:['index']),
        ];
    }

    public function index(): Renderable
    {
        $clients = $this->client->getAll();
        
        return view('admin.client.index' ,compact('clients'));
    }
}
