@extends('layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 bg-white">
                <!-- Vertical Navbar -->
                <nav class="navbar navbar-expand-lg navbar-light flex-column">
                    <div>
                        <img src="{{ asset('image/logo.png') }}" alt="" height="35px" class="mb-4">
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Create Events <span class="sr-only"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#calendar">Scheduled Events</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End of Vertical Navbar -->
            </div>
            <div class="col-lg-10">
                <div class="container">
                    <div class="heading py-2">
                        <h1 class="fs-4 fw-semibold">Events Calendar</h1>
                    </div>
                    <div class="content-wrapper">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
