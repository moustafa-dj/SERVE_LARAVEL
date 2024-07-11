@extends('admin.layouts.main')
@section('content')
  <style>
      .inline-buttons > * {
          display: inline-block;
          margin-right: 5px; /* Adjust the margin as needed */
      }
  </style>

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
                  <th>Description</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($domains as $domain)
                  <tr>
                    <td>{{$domain->name}}</td>
                    <td>{{$domain->description}}</td>
                    <td>
                      <span class="badge bg-{{\App\Enums\Domain\Status::color($domain->status->value)}}"><i class="bi bi-check-circle me-1"></i>
                        {{\App\Enums\Domain\Status::from($domain->status->value)->name}}
                      </span>
                    </td>
                    <td class="inline-buttons">
                      @can('delete-domain')
                        <form action="{{route('domains.destroy' , [$domain->id])}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                        </form>
                      @endcan
                      @can('edit-domain')
                        <a href ="{{route('domains.edit' , [$domain->id])}}" class="btn btn-success"><i class="bi bi-check-circle"></i></a>
                      @endcan
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
