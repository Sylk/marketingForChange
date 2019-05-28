@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$employee->company->name}} - {{$employee->first_name}} {{$employee->last_name}}</div>

                    <div class="card-body">
                        <div class="row">
                                <div class="col-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form method="POST" action="{{route('employee.update',['companyId'] => $employee->company->id, 'employeeId' => $employee->id])}}">
                                        {{ csrf_field() }}
                                        {{--Patch is better here since it's not a new resource--}}
                                        {{ method_field('PATCH') }}

                                        <div class="form-row">
                                            <div class="col">
                                                <label for="first-name">First Name</label>
                                                <input type="text" class="form-control" id="company-name" name="first_name" placeholder="First Name" value="{{$employee->first_name}}">
                                            </div>
                                            <div class="col">
                                                <label for="last-name">Last Name</label>
                                                <input type="text" class="form-control" id="last-name" name="last_name" placeholder="Last Name" value="{{$employee->last_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="company-id">Company Id</label>
                                            <input type="number" class="form-control" id="company-id" name="company-id" placeholder="Company Id" value="{{$employee->company->id}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$employee->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">Phone</label>
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Website" value="{{$employee->phone}}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection