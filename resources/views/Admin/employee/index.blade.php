@extends('admin.layouts.main')

@section('content')
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>
                    <b>N</b>ame
                  </th>
                  <th>Email</th>
                  <th>Domain</th>
                  <th>Adress</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($employees as $employee)
                  <tr>
                    <td>{{$employee->username}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->domain->name}}</td>
                    <td>{{$employee->adress}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>
                      <span class="badge bg-{{\App\Enums\Employee\Status::color($employee->status)}}"><i class="bi bi-check-circle me-1"></i>
                        {{\App\Enums\Employee\Status::from($employee->status)->name}}
                      </span>
                    </td>
                    @can('view-employee')
                      <td style="display: flex;">
                        <a href ="{{route('employees.show' , $employee->id)}}" class="btn btn-success"><i class="bi bi-check-circle"></i></a>
                      </td>
                    @endcan
                  </tr>
                @endforeach
                
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
