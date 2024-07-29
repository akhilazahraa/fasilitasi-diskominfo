@extends('layouts.admin') @section('container')
<div class="mb-0">
    <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
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
        <a href="/dashboard/events/create" class="btn btn-primary"
            >Create Events</a
        >
    </div>
</div>
<div class="content-wrapper">
    <div class="card p-4 border">
        @if ($events->isEmpty())
        <p>No events scheduled.</p>
        @else
        <table class="table text-sm">
            <thead class="font-semibold">
                <tr class="w-100">
                    <th>No</th>
                    <th>Name</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr class="lh-lg">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->start }}</td>
                    <td>{{ $event->end }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        <a
                            href="/dashboard/events/{{ $event->id }}/edit"
                            class="button-action"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-pencil-square"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"
                                />
                                <path
                                    fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"
                                />
                            </svg>
                            <span>Edit</span>
                        </a>
                        <form
                            action="/dashboard/events/delete/{{ $event->id }}"
                            method="POST"
                            style="display: inline"
                        >
                            @csrf @method('DELETE')
                            <button
                                type="submit"
                                class="button-action button-action-delete"
                                style="border: none; background: none"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="16"
                                    height="16"
                                    fill="currentColor"
                                    class="bi bi-trash3"
                                    viewBox="0 0 16 16"
                                >
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"
                                    />
                                </svg>
                                <span>Delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection