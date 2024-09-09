@extends('layouts.admin') @section('container')
<div class="d-flex justify-content-between align-items-center">
    <div class="heading mb-4">
        <h1 class="fs-2">Pengguna</h1>
        <p id="currentDateTime" class="text-muted-foreground">
        </p>
    </div>
    @if (auth()->user()->role == 'ADMIN')
    <a href="/dashboard/user/create" class="btn btn-primary">Tambah User</a>
@endif
</div>
<div class="content-wrapper">
    <div class="card p-4 border">
        @if ($user->isEmpty())
        <p>User belum tersedia.</p>
        @else
        <table class="table text-sm">
            <thead class="font-semibold">
                <tr class="w-100">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Telepon</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $user)
                <tr class="lh-lg">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{$user->phonenumber}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <a
                            href="/dashboard/user/edit/{{ $user->id }}"
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
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection
