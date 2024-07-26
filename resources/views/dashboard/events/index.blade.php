@extends('layouts.admin')

@section('container')
    <div class="mb-0">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Events</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
            </ol>
        </nav>
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <div class="heading mb-4">
            <h1 class="fs-3 fw-bold">Events</h1>
        </div>
        <div class="mb-4">
            <a href="/dashboard/events/create" class="btn btn-primary">Create Events</a>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="card p-4 border">
            @if ($events->isEmpty())
                <p>No events scheduled.</p>
            @else
                <table class="table">
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
                        <a href="{$events->id}">
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->start }}</td>
                                <td>{{ $event->end }}</td>
                                <td>{{ $event->location }}</td>
                                <td><a href="/dashboard/events/scheduled/{{ $event->id}}">View Location</a></td>
                            </tr>
                        </a>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
