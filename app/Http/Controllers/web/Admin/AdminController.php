<?php

namespace App\Http\Controllers\web\Admin;

use App\Contracts\AdminContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\UpdateAdminPassRequest;
use Illuminate\Contracts\Broadcasting\HasBroadcastChannel;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;


class AdminController extends Controller implements HasMiddleware
{
    protected AdminContract $admin;

    public function __construct(AdminContract $admin)
    {
        $this->admin = $admin;
    }

    public static function middleware():array
    {
        return [
            'role_or_permission:admin',
            new Middleware(PermissionMiddleware::using(
                'view-profile'), only:['renderProfile']),

            new Middleware(
                PermissionMiddleware::class . ':edit-profile',
                ['only' => ['update']]
            ),
            
            new Middleware(
                PermissionMiddleware::class . ':edit-pass',
                ['only' =>'updatePass']
            ),
        ];
    }

    public function index(): Renderable
    {
        return view('Admin.layouts.admin');
    }

    public function renderProfile(): Renderable
    {
        $admin = $this->admin->findById(Auth::guard('admin')->user()->id);

        return view('Admin.profile.profile' , compact('admin'));
    }

    public function update(AdminRequest $request): RedirectResponse
    {

        $id = auth()->user()->id;

        $data = $request->validated();

        $this->admin->update($id,$data);

        return redirect()->back();
    }

    public function removeProfileImg(): JsonResponse
    {
        $id = auth()->user()->id;

        $admin = $this->admin->findById($id);

        $this->admin->removeImg($admin);

        return response()->json([
            'success' => true
        ]);
    }

    public function updatePass(UpdateAdminPassRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $id = auth()->user()->id;

        $this->admin->updatePass($id,$data);

        return redirect()->back();
    }

}
