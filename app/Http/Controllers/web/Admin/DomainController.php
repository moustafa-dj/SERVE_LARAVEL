<?php

namespace App\Http\Controllers\web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DomainRequest;
use App\Contracts\DomainContract;

class DomainController extends Controller
{

    protected DomainContract $domain;

    public function __construct(DomainContract $domain)
    {
        $this->domain = $domain;
    }
    public function index(): Renderable
    {
        $domains = $this->domain->getAll();
        return view('admin.domain.index' , compact('domains'));
    }

    public function create(): Renderable
    {
        return view('admin.domain.create');
    }

    public function store(DomainRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $this->domain->create($data);

        return redirect()->route('domains.index');
    }

    public function edit($id): Renderable
    {
        $domain = $this->domain->findById($id);

        return view('admin.domain.edit' , compact('domain'));
    }

    public function update($id , DomainRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $domain = $this->domain->findById($id);

        $this->domain->update($domain->id , $data);

        return redirect()->route('domains.index');
    }
    public function show($id){

    }

    public function destroy($id): RedirectResponse
    {
        $this->domain->destroy($id);

        return redirect()->route('domains.index');
    }
}
