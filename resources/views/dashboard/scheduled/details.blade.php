@extends('layouts.admin')
@section('container')
    <div class="mb-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Events</a></li>
                <li class="breadcrumb-item"><a href="#">Scheduled</a></li>
                <li class="breadcrumb-item active" aria-current="page">Details</li>
            </ol>
        </nav>
    </div>
    <div class="heading mb-4">
        <h1 class="fs-3 fw-bold">Event Details</h1>
    </div>
    <div class="content-wrapper">
        <div class="card border shadow-sm">
            <div class="card-header bg-custom text-white">
                <h2 class="h5 mb-0">Event Information</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th scope="row">Event Name</th>
                            <td>Example Event</td>
                        </tr>
                        <tr>
                            <th scope="row">Location</th>
                            <td>Example Location</td>
                        </tr>
                        <tr>
                            <th scope="row">Date</th>
                            <td>Example Date</td>
                        </tr>
                        <tr>
                            <th scope="row">Start Time - End Time</th>
                            <td>Example Time</td>
                        </tr>
                        <tr>
                            <th scope="row">Description</th>
                            <td>Example Description</td>
                        </tr>
                        <!-- Add more rows here as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
