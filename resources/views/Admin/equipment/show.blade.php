@extends('admin.layouts.main')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Equipment details</h5>
                        <!-- Default Accordion -->
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="mb-3">
                                            <strong>Equipment Name</strong> : {{$equipment->name}}</br>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Equipment domain</strong> : {{$equipment->quantity}}</br>
                                        </div>
                                        <div class="mb-3">
                                            <strong class="mb-3">Equipment status</strong> :
                                            <span class="badge bg-{{\App\Enums\Equipment\Status::color($equipment->status)}}"><i class="bi bi-check-circle me-1"></i>
                                                {{\App\Enums\Equipment\Status::from($equipment->status)->name}}
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
                        <div class="accordion accordion-flush d-flex justify-content-between" id="accordionFlushExample">
                            <a href ="{{route('equipments.edit',$equipment->id)}}" class="btn btn-info">
                                <i class="bi bi-check-circle"></i>
                                Edit Equipment
                            </a>
                            <form action="{{route('equipments.destroy' , [$equipment->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-exclamation-octagon"></i>
                                    Delete Equipment
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection