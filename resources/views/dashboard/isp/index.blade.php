@extends('layouts.admin') @section('container')
    <div class="d-lg-flex justify-content-between align-items-center">
        <div class="heading mb-4">
            <h1 class="fs-2">ISP</h1>
            <p id="currentDateTime" class="text-muted-foreground">
            </p>
        </div>
        <div class="mb-4">
            <a href="/dashboard/isp/create" class="btn btn-primary">Tambah ISP</a>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="card p-4 border">
            @if ($isp->isEmpty())
                <p>No events scheduled.</p>
            @else
                <form id="bulk-delete-form" class="overflow-x-auto" action="/dashboard/isp/bulk-delete" method="POST">
                    @csrf @method('DELETE')
                    <table class="table text-sm">
                        <div class="d-flex justify-content-end">
                            <button type="submit" id="bulk-delete-btn"
                                class="bulk-delete fw-semibold text-sm button-action-delete mb-4" style="display: none">
                                Hapus
                            </button>
                        </div>
                        <thead class="font-semibold">
                            <tr class="w-100">
                                <th>
                                    <input type="checkbox" id="select-all" class="form-check-input" />
                                </th>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($isp as $item)
                                <tr class="lh-lg">
                                    <td>
                                        <input type="checkbox" name="ids[]" value="{{ $item->id }}"
                                            class="rowSelect form-check-input" />
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="/dashboard/isp/edit/{{ $item->id }}" class="button-action">
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
                <nav aria-label="Page navigation example">
                    {{ $isp->links('pagination::bootstrap-5') }} 
                </nav>
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
