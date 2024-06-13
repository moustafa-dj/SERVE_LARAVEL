@extends('admin.layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Domain Form</h5>

        <!-- Horizontal Form -->
        <form method="post" action="{{ route('domains.store')}}">
            @csrf
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="inputText" name="name">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10 ">
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"
                             name="description">

                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form><!-- End Horizontal Form -->

    </div>
</div>
@endsection