@extends('layouts.admin')
@section('container')
    <div class="mb-0">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Events</a></li>
                <li class="breadcrumb-item active" aria-current="page">Scheduled</li>
            </ol>
        </nav>
    </div>
    <div>
        <div class="heading mb-4">
            <h1 class="fs-3 fw-bold">Previous Events</h1>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="card border">
            <table class="table">
                <div class="d-flex gap-2 mb-4">
                    <a href="/dashboard/events/scheduled"
                        class="nav-dashboard {{ Request::is('dashboard/events/scheduled') ? 'active' : '' }}">Upcoming</a>
                    <a href="/dashboard/events/scheduled/previous" class="nav-dashboard {{ Request::is('dashboard/events/scheduled/previous') ? 'active' : '' }}">Previous</a>
                </div>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Location</th>
                        <th>Location Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $event->name }}</td>
                            <td>{{ $event->start }}</td>
                            <td>{{ $event->end }}</td>
                            <td>{{ $event->location }}</td>
                            <td><a href="{{ $event->location_link }}" target="_blank">View Location</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
