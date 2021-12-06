@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" href="{{route('dashboard')}}">Onlineinsure Payroll System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}"><i class="fas fa-home"></i> Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i>Salesrep
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="{{route('showallsalesrep')}}"><i class="fas fa-user-cog"></i> Salesrep Profile</a></li>
                            <li><a class="dropdown-item" href="{{route('add-salesrep')}}"><i class="fas fa-plus"></i> Add Salesrep Profile</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('createpayroll')}}"><i class="fas fa-pencil-alt"></i> Create Payroll</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fas fa-file-pdf"></i> PDF's</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Adding Salesrep</li>
                    </ol>
                </nav>
            </div>
        </div>
        
        <h3 class="text-center">Adding Sales Representative</h3>
        <hr>
        <div class="row mt-2">
            <div class="col-md-8 offset-2">
                 @if (session()->has('success'))
                    <div class="row ustify-content-md-center ">
                        <div class="col-md-12">
                            <span class="alert alert-success d-block text-center" role="alert">
                                {{ session('success') }} 
                            </span>
                        </div>
                    </div>  
                @endif
                <form action="{{route('savesalesrepform')}}" method="POST">
                     @csrf
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Salesrep name</label>
                        <div class="col-sm-9">
                            <input type="text" name="salesrepname" class="form-control" value="{{old('salesrepname')}}">
                        </div>
                        <span class="text-danger">@error('salesrepname')
                            {{$message}}
                        @enderror</span>
                    </div>
                    <div class="form-group row mt-2">
                        <label for="" class="col-sm-3 col-form-label">Set Commission Percentage</label>
                        <div class="col-sm-2">
                            <input type="number" min=0 name="setcommission" class="form-control" value="{{old('setcommission')}}">
                        </div>
                        
                        <label for="" class="col-sm-2 col-form-label">Tax Rate</label>
                        <div class="col-sm-2">
                            <input type="number" name="taxrate" min=0 class="form-control" value="{{old('taxrate')}}">
                        </div>

                         <label for="" class="col-sm-1 col-form-label">Bonuses</label>
                        <div class="col-sm-2">
                            <input type="number" min=0 name="bonus" class="form-control" value="{{old('bonus')}}">
                        </div>

                    </div>

                    <div class="form-group row mt-2">
                        <div class="col-sm-8 offset-2">
                            <button type="submit" class="btn btn-block btn-primary form-control">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    
@endsection