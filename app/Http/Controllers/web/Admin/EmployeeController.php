<?php

namespace App\Http\Controllers\web\Admin;

use App\Contracts\EmployeeContract;
use App\Enums\Employee\Status;
use App\Http\Controllers\Controller;
use GuzzleHttp\Middleware;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Middleware\PermissionMiddleware;

class EmployeeController extends Controller
{
    protected EmployeeContract $employee;

    public function __construct(EmployeeContract $employee)
    {
        $this->employee = $employee;
    }

    public static function middleware():array
    {
        return [
            'role_or_permission:admin',
            new Middleware(PermissionMiddleware::using(
                'view-list'), only:['index']),

            new Middleware(
                PermissionMiddleware::class . ':view',
                ['only' => ['show']]
            ),
            
            new Middleware(
                PermissionMiddleware::class . ':delete',
                ['only' =>'destroy']
            ),
        ];
    }

    public function index(): Renderable
    {
        $employees = $this->employee->findByAttribute(['status' => Status::ACCEPTED]);

        return view('admin.employee.index' , compact('employees'));
    }

    public function show($id): Renderable
    {
        $employee = $this->employee->findById($id);

        return view('admin.employee.show' , compact('employee'));
    }

    public function destroy($id): RedirectResponse
    {
        $this->employee->destroy($id);

        return redirect()->route('employees.index');
    }
}
