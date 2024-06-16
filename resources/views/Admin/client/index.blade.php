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
                  <th>Email</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($clients as $client)
                  <tr>
                    <td>{{$client->name}}</td>
                    <td>{{$client->email}}</td>
                    <td style="display: flex;">
                      <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                      </form>
                      <a href ="" class="btn btn-success"><i class="bi bi-check-circle"></i></a>
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