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
            <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                    <tr>
                        <th>Service</th>
                        <th>Location</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->service->title}}</td>
                            <td>{{$order->location}}</td>
                            <td>{{$order->order_date}}</td>
                            <td>
                                <span class="badge bg-{{\App\Enums\Order\Status::color($order->status->value)}}"><i class="bi bi-check-circle me-1"></i>
                                    {{\App\Enums\Order\Status::from($order->status->value)->name}}
                                </span>
                            </td>
                            <td class="inline-buttons">
                                <a href="{{route('client.order.show', $order->id)}}" class="btn btn-info ml-2"><i class="ri-zoom-in-line"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    
                    </tbody>
                </table>
                <!-- End Table with stripped rows -->

                </div>
            </div>

            </div>
        </div>
    </section>
@endsection