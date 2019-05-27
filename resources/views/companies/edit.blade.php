@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Companies Directory</div>

                    <div class="card-body">
                        <div class="row">
                                <div class="col-12">
                                    <form method="POST" action="/company/{{$company->id}}">
                                        {{ csrf_field() }}
                                        {{--Patch is better here since it's not a new resource--}}
                                        {{ method_field('PATCH') }}

                                        <div class="form-group">
                                            <label for="company-name">Company Name</label>
                                            <input type="text" class="form-control" id="company-name" name="company-name" placeholder="Company Name" value="{{$company->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$company->email}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="website">Website</label>
                                            <input type="url" class="form-control" id="website" name="website" placeholder="Website" value="{{$company->website}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="logo">Logo</label>
                                            <input type="file" class="form-control-file" id="logo" name="logo">
                                        </div>
                                    </form>

                                    {{--<div class="card h-100">--}}
                                        {{--<img class="card-img-top" src="{{$company->logo}}" alt="Card image cap">--}}
                                        {{--<div class="card-body">--}}
                                        {{--</div>--}}
                                        {{--<form method="POST" action="/company/{{$company->id}}">--}}
                                            {{--< class="card-title">{{$company->name}}</>--}}

                                            {{--{{ csrf_field() }}--}}
                                            {{--Patch is better here since it's not a new resource--}}
                                            {{--{{ method_field('PATCH') }}--}}

                                            {{--<div class="form-group">--}}
                                                {{--<input type="submit" class="btn btn-danger" value="Obliterate" onclick="return confirm('This will destroy all employees connected as well are you sure?')">--}}
                                            {{--</div>--}}
                                        {{--</form>--}}
                                    {{--</div>--}}
                                </div>
                        </div>
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection