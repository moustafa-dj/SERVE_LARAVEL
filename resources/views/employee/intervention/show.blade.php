@extends('app')
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
        .profile{
            margin-top: 100px;
        }
    </style>
    <section class="container section profile">
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
                            <span class="badge bg-{{\App\Enums\Intervention\Status::color($intervention->status)}}"><i class="bi bi-check-circle me-1"></i>
                                
                            </span>
                            foreach($intervention->employees as $employee)
                                <table class="table">
                                    <body>
                                        @foreach($intervention->equipments as $equipment)
                                        <tr>
                                            <td>{{$employee->username}}</td>
                                            <td>
                                            {{\App\Enums\Intervention\EmployeeStatus::from($employee->pivot->employee_status)->name}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </body>
                                </table>
                            @endforeach
                            <div class="alert alert-warning w-100 text-center">
                                No actions to perform
                            </div>
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