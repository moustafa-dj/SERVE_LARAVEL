@extends('app')
@section('content')
<style>
    .profile{
        margin-top: 100px;
    }
    .inline-buttons > * {
          display: inline-block;
          margin-right: 5px; /* Adjust the margin as needed */
      }
</style>
<section class="container section profile">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
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
            
                <tr>
                    <td>=</td>
                    <td></td>
                    <td>
                    </td>
                    <td class="inline-buttons">
                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-exclamation-octagon"></i></button>
                    </form>
                    <a href ="" class="btn btn-success"><i class="bi bi-check-circle"></i></a>
                    <a href="" class="btn btn-info ml-2"><i class="ri-zoom-in-line"></i></a>
                    </td>
                </tr>        
            </tbody>
            </table>
            <!-- End Table with stripped rows -->

        </div>
        </div>
    </div>
</section>
@endsection