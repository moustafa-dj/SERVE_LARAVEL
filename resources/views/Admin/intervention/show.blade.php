@extends('admin.layouts.main')
@section('content')
    <style>
        .carousel{
        }
        .carousel-item{
            height: 300px;
        }
        .carousel-item img{
            height: 100%;
        }
    </style>
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Intervention details</h5>
                        <!-- Default Accordion -->
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="mb-3">
                                            <strong>Intervention Client</strong> : {{$intervention->order->client->name}}</br>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Intervention service</strong> : {{$intervention->order->service->title}}</br>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Intervention location</strong> : {{$intervention->order->location}}</br>
                                        </div>
                                        <div class="mb-3">
                                            <strong class="mb-3">Intervention status</strong> :
                                            <span class="badge bg-{{\App\Enums\Intervention\Status::color($intervention->status)}}"><i class="bi bi-check-circle me-1"></i>
                                                {{\App\Enums\Intervention\Status::from($intervention->status->value)->name}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Default Accordion Example -->
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Intervention Actions</h5>
                        <div class="accordion accordion-flush d-flex justify-content-between" id="accordionFlushExample">
                            @if(\App\Enums\Intervention\Status::from($intervention->status->value)->name === 'PENDING')
                                <a href ="{{route('admin.intervention.confirm',$intervention->id)}}" class="btn btn-info">
                                    <i class="bi bi-check-circle"></i>
                                    Lunch Intervention
                                </a>
                            @elseif(\App\Enums\Intervention\Status::from($intervention->status->value)->name === 'IN_PROGRESS')
                                <a href ="" class="btn btn-danger">
                                    <i class="bi bi-check-circle"></i>
                                    Cancele Intervention
                                </a>
                            @else
                                <div class="alert alert-warning w-100 text-center">
                                    No actions to perform
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Employees</h5>
                        <div class="accordion accordion-flush d-flex justify-content-between" id="accordionFlushExample">
                            <table class="table">
                                <body>
                                    @foreach($intervention->employees as $employee)
                                        <tr>
                                            <td>{{$employee->username}}</td>
                                            <td>
                                                <a href ="{{route('admin.intervention.detach-employee',['employee_id' => $employee->id,$intervention->id])}}" class="btn btn-danger">
                                                    <i class="bi bi-check-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </body>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Equipments</h5>
                        <div class="accordion accordion-flush d-flex justify-content-between" id="accordionFlushExample">
                            <table class="table">
                                <body>
                                    @foreach($intervention->equipments as $equipment)
                                    <tr>
                                        <td>{{$equipment->name}}</td>
                                        <td>
                                            <a href ="{{route('admin.intervention.detach-equipment',['equipment_id' => $equipment->id,$intervention->id])}}" class="btn btn-danger">
                                                <i class="bi bi-check-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </body>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection