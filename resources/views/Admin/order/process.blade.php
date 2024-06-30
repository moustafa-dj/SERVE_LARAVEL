@extends('admin.layouts.main')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Process order Form</h5>

        <!-- Horizontal Form -->
        <form method="post" action="{{ route('admin.order.accept' , $order->id)}}">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Employees</label>
                <div class="col-sm-10">
                <select class="form-select @error('employee_id') is-invalid @enderror" multiple name="employee_id[]">
                    <option>Select the employees</option>
                    @foreach($employees as $employee)
                        <option value="{{$employee->id}}">{{$employee->username}}</option>
                    @endforeach
                </select>
                @error('employee_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                 @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Equipments</label>
                <div class="col-sm-10">
                <select class="form-select @error('equipment_id') is-invalid @enderror" multiple name="equipment_id[]">
                    <option>Select equipments</option>
                    @foreach($equipments as $equipment)
                        <option value="{{$equipment->id}}">{{$equipment->name}}</option>
                    @endforeach
                </select>
                @error('equipment_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                 @enderror
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form><!-- End Horizontal Form -->

    </div>
</div>
@endsection