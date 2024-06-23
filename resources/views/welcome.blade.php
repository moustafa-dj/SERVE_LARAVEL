@extends('app')
@section('content')
    <div class="slider">
        <div class="slides">
            <div class="slide active" style="background-image: url('img/slide1.jpg');">
                <div class="overlay">
                    <div class="container"> 
                    <h2>Slide 1 Title</h2>
                    <p>Slide 1 description goes here.</p>
                    </div>
                </div>
            </div>
            <div class="slide" style="background-image: url('img/slide2.jpg');">
                <div class="overlay">
                    <h2>Slide 2 Title</h2>
                    <p>Slide 2 description goes here.</p>
                </div>
            </div>
            <div class="slide" style="background-image: url('img/slide3.jpg');">
                <div class="overlay">
                    <h2>Slide 3 Title</h2>
                    <p>Slide 3 description goes here.</p>
                </div>
            </div>
        </div>
        <div class="navigation">
            <div class="prev">&#10094;</div>
            <div class="next">&#10095;</div>
        </div>
    </div>
    <div class="services">
        <div class="container">
            <h3>Services</h3>
            <div class="service-content">
                @foreach($services as $service)
                <div class="service">
                    <div class="img-container">
                        <img src="{{asset('admin/assets/img/card.jpg')}}" class="card-img-top" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$service->title}}</h5>
                        <p class="card-text">{{$service->description}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
    

