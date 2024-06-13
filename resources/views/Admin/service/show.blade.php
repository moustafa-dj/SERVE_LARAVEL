@extends('admin.layouts.main')
@section('content')
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
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{$service->title}}
                                </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Service domain</strong> : {{$service->domain->name}}</br>
                                        <strong>Service price</strong> : {{$service->price}}</br>
                                        <strong>Service description</strong> : {{$service->description}}</br>
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

                        <!-- Accordion without outline borders -->
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            @foreach($service->images as $img)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-{{$img->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne-{{$img->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            <img src="{{ $img->img }}" alt="Description of the image">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- End Accordion without outline borders -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection