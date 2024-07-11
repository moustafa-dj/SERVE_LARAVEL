@extends('app')
@section('content')
    <style>
        .inline-buttons > * {
            display: inline-block;
            margin-right: 5px; /* Adjust the margin as needed */
        }
        .section{
            margin-top: 100px;
        }
    </style>
    <section class="container section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order details</h5>
                        <!-- Default Accordion -->
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="mb-3">
                                            <strong>Order service</strong> : {{$order->service->title}}</br>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Order location</strong> : {{$order->location}}</br>
                                        </div>
                                        <div class="mb-3">
                                            <strong>Order date</strong> : {{$order->order_date}}</br>
                                        </div>
                                        <div class="mb-3">
                                            <strong class="mb-3">Order status</strong> :
                                            <span class="badge bg-{{\App\Enums\Order\Status::color($order->status)}}"><i class="bi bi-check-circle me-1"></i>
                                                {{\App\Enums\Order\Status::from($order->status->value)->name}}
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
                        <h5 class="card-title">Order Actions</h5>
                        <div class="accordion accordion-flush d-flex justify-content-between" id="accordionFlushExample">
                            @if(\App\Enums\Order\Status::from($order->status->value)->name === 'PENDING')
                                <a  class="btn btn-secondary" href ="{{route('client.order.cancele',$order->id)}}" >
                                    <i class="bi bi-check-circle"></i>
                                    Cancele Order
                                </a>
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