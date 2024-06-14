@extends('admin.layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Service Form</h5>

        <!-- Horizontal Form -->
        <form method="post" action="{{ route('services.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputText" name="title">
                    @error('title')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10 ">
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea class="form-control @error('description') is-invalid @enderror" placeholder="description" id="floatingTextarea" style="height: 100px;"
                             name="description">

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
                <label for="inputEmail3" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="inputText" name="price">
                    @error('price')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                    @enderror
                </div>
                
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Domain</label>
                <div class="col-sm-10">
                    <select class="form-select @error('domain_id') is-invalid @enderror" aria-label="Default select example" name="domain_id">
                        <option value="" selected>Select a domain</option>
                        @foreach($domains as $domain) 
                            <option value="{{$domain->id}}">{{$domain->name}}</option>
                        @endforeach
                    </select>
                    @error('domain_id')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Images</label>
                <div class="col-sm-10">
                    <input type="file" step="0.01" class="form-control @error('images') is-invalid @enderror" id="inputText" name="images[]" multiple>
                    @error('images')
                        <span class="invalid-feedback">
                            {{$message}}
                        </span>
                    @enderror
                    @error('images.*')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                    @enderror
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