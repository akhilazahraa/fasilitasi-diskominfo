@extends('layouts.admin') @section('container')
    <div class="mb-0">
        <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Acara</a></li>
                <li class="breadcrumb-item active" aria-current="page">Filter</li>
            </ol>
        </nav>
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <div class="heading mb-4">
            <h1 class="fs-3 fw-bold">{{ $providers->name }}</h1>
        </div>
        <div class="mb-4 d-flex justify-content-between gap-2">
            <a href="{{ route('dashboard.events.exportFilterIspPdf', ['isp_id' => $isp_id]) }}" class="btn btn-outline"
                target="_blank">
                Export PDF
            </a>

            <a href="/dashboard/events/create" class="btn btn-primary">Tambah Acara</a>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="card p-4 border">
            @if ($events->isEmpty())
                <p>Belum ada acara.</p>
            @else
                <form id="bulk-delete-form" action="/dashboard/events/bulk-delete" method="POST">
                    @csrf @method('DELETE')
                    <table class="table text-sm">
                        <div>
                            <button type="submit" id="bulk-delete-btn"
                                class="bulk-delete fw-semibold text-sm button-action-delete mb-4" style="display: none">
                                Hapus
                            </button>
                        </div>
                        <thead class="font-semibold">
                            <tr class="w-100">
                                <th>
                                    <input type="checkbox" class="form-check-input" id="select-all" />
                                </th>
                                <th>No</th>
                                <th>Nama Acara</th>
                                <th>Tanggal</th>
                                <th>Nama OPD</th>
                                <th>ISP</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $item)
                                <tr class="lh-lg">
                                    <td>
                                        <input type="checkbox" name="ids[]" value="{{ $item->id }}"
                                            class="rowSelect form-check-input" />
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->start }}</td>
                                    <td class="clamped-text">
                                        {{ $item->instansi->name }}
                                    </td>
                                    <td>{{ $item->isp }}</td>
                                    <td>
                                        <a href="/dashboard/events/edit/{{ $item->id }}" class="button-action">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                <path fill-rule="evenodd"
                                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                            </svg>
                                            <span>Edit</span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const selectAllCheckbox = document.getElementById("select-all");
            const checkboxes = document.querySelectorAll(".rowSelect");
            const bulkDeleteButton = document.getElementById("bulk-delete-btn");

            function toggleBulkDeleteButton() {
                const checkedCheckboxes =
                    document.querySelectorAll(".rowSelect:checked").length;
                bulkDeleteButton.style.display =
                    checkedCheckboxes > 0 ? "block" : "none";
            }

            selectAllCheckbox.addEventListener("change", (e) => {
                checkboxes.forEach((checkbox) => {
                    checkbox.checked = e.target.checked;
                });
                toggleBulkDeleteButton();
            });

            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener("change", () => {
                    toggleBulkDeleteButton();
                });
            });
        });
    </script>
@endsection
