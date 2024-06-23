@extends('admin.layouts.main')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">employee details</h5>
                        <!-- Default Accordion -->
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="mb-3">
                                            <strong >Username</strong> : {{$employee->username}}</br>
                                        </div>
                                        <div class="mb-3">
                                            <strong class="mb-3">employee domain</strong> : {{$employee->domain->name}}</br>
                                        </div>
                                        <div class="mb-3">
                                            <strong class="mb-3">employee email</strong> : {{$employee->email}}</br>
                                        </div>

                                        <div class="mb-3">
                                            <strong class="mb-3">employee address</strong> : {{$employee->adress}}</br>
                                        </div>
                                        <div class="mb-3">
                                            <strong class="mb-3">employee phone</strong> : {{$employee->phone}}</br>
                                        </div>
                                        <div class="mb-3">
                                            <strong class="mb-3">employee status</strong> :
                                            <span class="badge bg-{{\App\Enums\Employee\Status::color($employee->status)}}"><i class="bi bi-check-circle me-1"></i>
                                                {{\App\Enums\Employee\Status::from($employee->status)->name}}
                                            </span>
                                        </div>
                                        <div class="mb-3">
                                            <strong class="mb-3">employee resume</strong> : <a href="">Dawnload Resume</a></br>
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
                        <div class="accordion accordion-flush d-flex justify-content-between" id="accordionFlushExample">
                            <form action="{{route('employees.destroy' , [$employee->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-check-circle"></i>
                                    Delete Employee
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection