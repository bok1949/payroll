@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-3 mb-4">
            <div class="col-md-4 offset-4">
                <img src="{{asset('images/ei-logo-v3.png')}}" alt="" class="w-75 h-100">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h4 class="text-center">Payroll Software</h4>
                <hr>
                <form action="{{route('auth.check')}}" method="POST">
                    @csrf
                    <div class="results">
                        @if (Session::get('fail'))
                            <div class="alert alert-danger">
                                {!! Session::get('fail') !!}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Enter Username..." value="{{old('username')}}">
                        <span class="text-danger">@error('username')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form-group mt-2">
                        <input type="password" name="password" class="form-control" placeholder="Enter password...">
                        <span class="text-danger">@error('password')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-block btn-primary form-control">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection