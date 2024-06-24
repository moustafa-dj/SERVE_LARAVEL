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
                    <b>N</b>ame
                  </th>
                  <th>Quantity</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($equipments as $equipment)
                  <tr>
                    <td>{{$equipment->name}}</td>
                    <td>{{$equipment->description}}</td>
                    <td>
                      <span class="badge bg-{{\App\Enums\Equipment\Status::color($equipment->status->value)}}"><i class="bi bi-check-circle me-1"></i>
                        {{\App\Enums\Equipment\Status::from($equipment->status->value)->name}}
                      </span>
                    </td>
                    <td style="display: flex;">
                      <form action="{{route('equipments.destroy' , [$equipment->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                      </form>
                      <a href ="{{route('equipments.edit' , [$equipment->id])}}" class="btn btn-success"><i class="bi bi-check-circle"></i></a>
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
