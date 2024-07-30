@extends('layouts.admin') @section('container')
<div class="mb-0">
    <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Laporan</a></li>
            <li class="breadcrumb-item active" aria-current="page">List</li>
        </ol>
    </nav>
</div>
<div class="d-flex justify-content-between align-items-center">
    <div class="heading mb-4">
        <h1 class="fs-3 fw-bold">Laporan</h1>
    </div>
</div>
<div class="content-wrapper">
    <div class="card p-4 border">
        @if ($report->isEmpty())
        <p>Laporan belum tersedia.</p>
        @else
        <table class="table text-sm">
            <thead class="font-semibold">
                <tr class="w-100">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Title</th>
                    <th>Documentation</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($report as $report)
                <tr class="lh-lg">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $report->user->name }}</td>
                    <td>{{ $report->title }}</td>
                    <td>
                        @if($report->documentation)
                        <img
                            src="{{ asset('storage/documentation/' . $report->documentation) }}"
                            alt="Documentation"
                            class="rounded"
                            style="max-height: 50px; height: auto"
                        />
                        @else
                        <p>Tidak ada dokumentasi</p>
                        @endif
                    </td>
                    <td>
                        @if ($report->status == 'on progress')
                        <span class="badge bg-warning text-white"
                            >On Progress</span
                        >
                        @elseif ($report->status == 'completed')
                        <span class="badge bg-success text-white"
                            >Completed</span
                        >
                        @elseif ($report->status == 'pending')
                        <span class="badge bg-secondary text-white"
                            >Pending</span
                        >
                        @elseif ($report->status == 'canceled')
                        <span class="badge bg-danger text-white">Canceled</span>
                        @endif
                    </td>
                    <td>
                        <a
                            href="/dashboard/reports/details/{{ $report->id }}"
                            class="button-action"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="20"
                                height="20"
                                fill="currentColor"
                                class="bi bi-eye"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"
                                />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"
                                />
                            </svg>
                            <span>Lihat detail</span>
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
