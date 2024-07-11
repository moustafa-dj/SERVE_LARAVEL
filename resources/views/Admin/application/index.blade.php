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
                @foreach($applications as $application)
                  <tr>
                    <td>{{$application->username}}</td>
                    <td>{{$application->email}}</td>
                    <td>{{$application->domain->name}}</td>
                    <td>{{$application->adress}}</td>
                    <td>{{$application->phone}}</td>
                    <td>
                      <span class="badge bg-{{\App\Enums\Employee\Status::color($application->status)}}"><i class="bi bi-check-circle me-1"></i>
                        {{\App\Enums\Employee\Status::from($application->status)->name}}
                      </span>
                    </td>
                    <td style="display: flex;">
                      @can('view-application')
                      <a href ="{{route('admin.applications.show' , $application->id)}}" class="btn btn-success"><i class="bi bi-check-circle"></i></a>
                      @endcan
                    </td>

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
