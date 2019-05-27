@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Companies Directory</div>

                    <div class="card-body">
                        <div class="row">
                        @foreach($companies as $company)
                            <div class="col-4 pb-3">
                                <div class="card h-100">
                                    <img class="card-img-top" src="{{$company->logo}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$company->name}}</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <a href="/company/{{$company->id}}" class="btn btn-primary">Edit</a>

                                        <form method="POST" action="/company/{{$company->id}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-danger" value="Obliterate" onclick="return confirm('This will destroy all employees connected as well are you sure?')">
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