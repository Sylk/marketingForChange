@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$employees[0]->company->name}}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 pb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <a href="/" class="btn btn-primary p-1">New Employee</a>
                                    </div>
                                </div>
                            </div>
                            @foreach($employees as $employee)
                                <div class="col-6 pb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$employee->first_name}} {{$employee->last_name}}</h5>
                                            <p class="card-text">
                                                Email: {{$employee->email}}
                                                <br>
                                                Phone: {{$employee->phone}}
                                            </p>
                                            <a href="/{{$employee->company_id}}/{{$employee->id}}" class="btn btn-primary p-1">Edit</a>

                                            <form method="POST" action="/{{$employee->company_id}}/{{$employee->id}}" class="d-inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-danger p-1" value="Obliterate" onclick="return confirm('This will destroy the employee and is not a safe delete are you sure?')">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection