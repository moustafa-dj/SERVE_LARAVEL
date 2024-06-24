@extends('app')
@section('content')
<style>
    .profile{
        margin-top: 100px;
    }
    .btn{
        background-color: #4154f1;
        color: #fff;
    }
    .btn:hover{
        background-color: #4154f1;
        color: #fff;
    }
</style>
    <section class="container section profile">
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                <h5 class="card-title">{{ucfirst($service->title)}} Details</h5>
                                              <!-- Slides with controls -->
                                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach($service->images as $image)
                                            <div class="carousel-item active">
                                                <img src="{{asset('$image->img')}}" class="d-block w-100" alt="...">
                                            </div>
                                        @endforeach
                                        <div class="carousel-item active">
                                            <img src="{{asset('admin/assets/img/slides-1.jpg')}}" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{asset('admin/assets/img/slides-2.jpg')}}" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{asset('admin/assets/img/slides-3.jpg')}}" class="d-block w-100" alt="...">
                                        </div>
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
                    </div><!-- End Bordered Tabs -->
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <div class="show active profile-overview" id="profile-overview">

                            <h5 class="card-title">Service Details</h5>

                            <div class="row">
                                <div class=" label ">Service : {{$service->title}}</div>
                                <div class="col-lg-9 col-md-8"></div>
                            </div>

                            <div class="row">
                                <div class=" label">Address : {{auth()->user()->adress}}</div>
                                <div class="col-lg-9 col-md-8"></div>
                            </div>

                            <div class="row">
                                <div class=" label">Price : {{$service->price}}</div>
                                <div class="col-lg-9 col-md-8"></div>
                            </div>
                        </div>
                        <div class="text-center pt-3">
                            <form method="POST"  action="{{route('client.order.store')}}">
                                @csrf
                                <div class="mb-3">
                                    <div class="col-md-8 col-lg-12">
                                        <input name="client_id" type="hidden" class="form-control"
                                        value="{{auth()->user()->id}}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-md-8 col-lg-12">
                                        <input name="service_id" type="hidden" class="form-control"
                                        value="{{$service->id}}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-md-8 col-lg-12">
                                        <input name="location" type="hidden" class="form-control
                                        @error('location') is-invalid @enderror"
                                        value="{{auth()->user()->adress}}">
                                        @error('location')
                                            <span class="invalid-feedback">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn">
                                        <i class="ri-add-fill"></i>
                                        Make Order
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection