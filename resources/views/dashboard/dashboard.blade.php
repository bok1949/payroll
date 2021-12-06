@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-info">
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

    <div class="container">
        <div class="row">
            <div class="col-md-12"></div>
        </div>

    </div>
    
@endsection