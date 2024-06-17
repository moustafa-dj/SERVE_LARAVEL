<?php

namespace App\Http\Controllers\web\Client;

use App\Contracts\ClientContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\updateClientPassRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
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

    public function updatePass(updateClientPassRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $id = auth()->user()->id;

        $this->client->updatePass($id , $data);

        return redirect()->back();
    }

    public function update(ClientRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $id = auth()->user()->id;

        $this->client->update($id , $data);

        return redirect()->back();
    }
}
