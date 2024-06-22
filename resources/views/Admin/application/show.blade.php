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
                        <div class="accordion accordion-flush d-flex justify-content-start" id="accordionFlushExample">
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                            </form>
                            <a href ="" class="btn btn-success"><i class="bi bi-check-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection