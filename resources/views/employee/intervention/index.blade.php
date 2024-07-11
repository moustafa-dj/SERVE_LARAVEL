@extends('app')
@section('content')
<style>
    .profile{
        margin-top: 100px;
    }
    .inline-buttons > * {
          display: inline-block;
          margin-right: 5px; /* Adjust the margin as needed */
    }
</style>
<section class="container section profile">
    <div class="col-md-12">
        <div class="card">
        <div class="card-body">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Oder</th>
                        <th>Status</th>
                        <th>Equipments</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($interventions as $intervention)
                        <tr>
                            <td>ORDER_{{$intervention->order->id}}</td>
                            <td>
                            <span class="badge bg-{{\App\Enums\Intervention\Status::color($intervention->status)}}"><i class="bi bi-check-circle me-1"></i>
                                {{\App\Enums\Intervention\Status::from($intervention->status->value)->name}}
                            </span>
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
                                <a href="{{route('employee.intervention.show',$intervention->id)}}" class="btn btn-info ml-2"><i class="ri-zoom-in-line"></i></a>
                            </td>
                        </tr>
                    @endforeach       
                </tbody>
            </table>
            <!-- End Table with stripped rows -->
        </div>
        </div>
    </div>
</section>
@endsection