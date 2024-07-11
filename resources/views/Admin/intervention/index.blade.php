@extends('admin.layouts.main')

@section('content')
  <style>
      .inline-buttons > * {
          display: inline-block;
          margin-right: 5px; /* Adjust the margin as needed */
      }
  </style>
  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>Oder</th>
                  <th>Status</th>
                  <th>Employees</th>
                  <th>Equipments</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($interventions as $intervention)
                  <tr>
                    <td>ORDER__{{$intervention->order->id}}</td>
                    <td>
                      <span class="badge bg-{{\App\Enums\Intervention\Status::color($intervention->status)}}"><i class="bi bi-check-circle me-1"></i>
                        {{\App\Enums\Intervention\Status::from($intervention->status->value)->name}}
                      </span>
                    </td>
                    <td>
                        @foreach($intervention->employees as $employee)
                            <ol>
                                <li>
                                    {{$employee->username}}
                                </li>
                            </ol>
                        @endforeach
                    </td>
                    <td>
                        @foreach($intervention->equipments as $equipment)
                            <ol>
                                <li>
                                    {{$equipment->name}}
                                </li>
                            </ol>
                        @endforeach
                    </td>
                    <td class="inline-buttons">
                      @can('view-intervention')
                        <a href="{{route('admin.intervention.show',$intervention->id)}}" class="btn btn-info ml-2"><i class="ri-zoom-in-line"></i></a>
                      @endcan
                      @can('edit-intervention')
                        <a href ="{{route('admin.intervention.edit',$intervention->id)}}" class="btn btn-success"><i class="bi bi-check-circle"></i></a>
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
