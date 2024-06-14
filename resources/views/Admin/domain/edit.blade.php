@extends('admin.layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Domain Form</h5>

        <!-- Horizontal Form -->
        <form method="post" action="{{ route('domains.update' , $domain->id)}}">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputText" name="name"
                    value = "{{ $domain->name}}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10 ">
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"
                             name="description">
                                {{$domain->description}}
                            </textarea>
                            @error('description')
                                <span class="invalid-feedback">
                                    {{$message}}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="status"
                    selected = "{{\App\Enums\Domain\Status::from($domain->status->value)->name}}">
                        @foreach(\App\Enums\Domain\Status::values() as $value)
                            <option value="{{$value}}">{{\App\Enums\Domain\Status::from($value)->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </form><!-- End Horizontal Form -->

    </div>
</div>
@endsection