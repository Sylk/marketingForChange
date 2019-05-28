@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Companies Directory</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 pb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <a href="{{route('company.create')}}" class="btn btn-primary p-1">New Company</a>
                                    </div>
                                </div>
                            </div>
                        @foreach($companies as $company)
                            <div class="col-6 pb-3">
                                <div class="card h-100">
                                    <img class="card-img-top" src="{{$company->logo}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$company->name}}</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="/{{$company->id}}" class="btn btn-primary p-1">Edit</a>
                                        <a href="/{{$company->id}}/employees" class="btn btn-secondary p-1">Employees</a>

                                        <form method="POST" action="{{route('company.delete', ['companyId', $company->id])}}" class="d-inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-danger p-1" value="Obliterate" onclick="return confirm('This will destroy all employees connected as well are you sure?')">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection