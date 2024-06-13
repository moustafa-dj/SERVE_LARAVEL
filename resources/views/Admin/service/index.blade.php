@extends('admin.layouts.main')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                    <tr>
                        <th>
                        <b>T</b>itle
                        </th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Domain</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($services as $service)
                        <tr>
                        <td>{{$service->title}}</td>
                        <td>{{$service->description}}</td>
                        <td>{{$service->price}}</td>
                        <td>{{$service->domain->name}}</td>
                        <td style="display: flex;">
                            <form action="{{route('services.destroy' , [$service->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                            </form>
                            <a href ="{{route('services.edit' , [$service->id])}}" class="btn btn-success"><i class="bi bi-check-circle"></i></a>
                            <a href ="{{route('services.show' , [$service->id])}}" class="btn btn-success"><i class="ri-zoom-in-line"></i></a>
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