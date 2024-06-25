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
                        <h5 class="card-title">Service details</h5>
                        <!-- Default Accordion -->
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    <div class="mb-3">
                                        <strong>Service title</strong> : {{$service->title}}</br>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Service domain</strong> : {{$service->domain->name}}</br>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Service price</strong> : {{$service->price}}</br>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Service description</strong> : {{$service->description}}</br>
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
                        <h5 class="card-title">Service images</h5>

                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($service->images as $image)
                                    <div class="carousel-item active">
                                        <img src="{{asset($image->img)}}" class="d-block w-100" alt="...">
                                    </div>
                                @endforeach
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection