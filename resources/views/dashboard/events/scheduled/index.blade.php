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
            <h1 class="fs-3 fw-bold">Scheduled Events</h1>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="d-flex gap-2 mb-4">
            <a href="/dashboard/events/scheduled"
                class="nav-dashboard {{ Request::is('dashboard/events/scheduled') ? 'active' : '' }}">Upcoming</a>
            <a href="/dashboard/events/scheduled/previous"
                class="nav-dashboard {{ Request::is('dashboard/events/scheduled/previous') ? 'active' : '' }}">Previous</a>
        </div>
        <div class="row g-4">
            @foreach ($events as $event)
                <div class="col-md-4">
                    <a href="/dashboard/events/scheduled/{{ $event->id }}"
                        class="card card-scheduled p-4 border-0 h-100 text-decoration-none">
                        <div>
                            <h1 class="fs-6 fw-semibold mb-4">{{ $event->name }}</h1>
                            <div>
                                <div class="d-flex gap-3 align-items-center mb-2"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="#7a7a7a" class="bi bi-calendar3"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2M1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857z" />
                                        <path
                                            d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2m3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                                    </svg>
                                    <span class="text-muted-custom">{{ date('Y-m-d', strtotime($event->start)) }}</span>

                                </div>
                                <div class="d-flex gap-3 align-items-center mb-2"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="#7a7a7a" class="bi bi-clock"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z" />
                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0" />
                                    </svg>
                                    <span class="text-muted-custom">{{ date('H:i', strtotime($event->start)) }}</span>

                                </div>
                                <div class="d-flex gap-3 align-items-center mb-2">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#7a7a7a"
                                            class="bi bi-geo-alt" viewBox="0 0 16 16">
                                            <path
                                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                        </svg>
                                    </div>
                                    <span class="text-muted-custom">{{ $event->location }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
