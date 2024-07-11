@extends('admin.layouts.main')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Application details</h5>
                        <!-- Default Accordion -->
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="mb-3">
                                            <strong >Username</strong> : {{$application->username}}</br>
                                        </div>
                                        <div class="mb-3">
                                            <strong class="mb-3">application domain</strong> : {{$application->domain->name}}</br>
                                        </div>
                                        <div class="mb-3">
                                            <strong class="mb-3">application email</strong> : {{$application->email}}</br>
                                        </div>

                                        <div class="mb-3">
                                            <strong class="mb-3">application address</strong> : {{$application->adress}}</br>
                                        </div>
                                        <div class="mb-3">
                                            <strong class="mb-3">application phone</strong> : {{$application->phone}}</br>
                                        </div>
                                        <div class="mb-3">
                                            <strong class="mb-3">application status</strong> :
                                            <span class="badge bg-{{\App\Enums\Employee\Status::color($application->status)}}"><i class="bi bi-check-circle me-1"></i>
                                                {{\App\Enums\Employee\Status::from($application->status)->name}}
                                            </span>
                                        </div>
                                        @can('dawnload-resume-application')
                                            <div class="mb-3">
                                                <strong class="mb-3">application resume</strong> : <a href="{{route('admin.applications.dawnload-resume' ,$application->id )}}">Dawnload Resume</a></br>
                                            </div>
                                        @endcan
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
                        <h5 class="card-title">Actions</h5>
                        <!-- Accordion without outline borders -->
                        <div class="accordion accordion-flush d-flex justify-content-between" id="accordionFlushExample">
                         @if(\App\Enums\Employee\Status::from($application->status)->name === 'PENDING')
                            @can('accept-application')
                                <a href ="{{route('admin.applications.approve',$application->id)}}" class="btn btn-info">
                                    <i class="bi bi-check-circle"></i>
                                    Accept Application
                                </a>
                            @endcan
                            @can('refuse-application')
                                <a href ="{{route('admin.applications.refuse',$application->id)}}" class="btn btn-danger">
                                    <i class="bi bi-check-circle"></i>
                                    Refuse Application
                                </a>
                            @endcan
                        @else
                            <div class="alert alert-warning w-100 text-center">
                                No actions to perform
                            </div>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection