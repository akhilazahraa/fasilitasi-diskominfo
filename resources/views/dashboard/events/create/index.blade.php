@extends('layouts.admin') @section('container')
<div class="mb-0">
    <nav style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Acara</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </nav>
</div>
<div class="heading mb-4">
    <h1 class="fs-3 fw-bold">Tambah Acara</h1>
</div>
<div class="content-wrapper">
    <div class="card p-4 border">
        <form
            action="{{ route('events.store') }}"
            method="POST"
            enctype="multipart/form-data"
            class="row"
        >
            @csrf
            <div class="col-lg-6 mb-4">
                <label class="form-label">Nama Acara</label>
                <input type="text" name="name" class="form-control" required />
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label">Nama OPD</label>
                <select name="opd_id" class="form-control" required>
                    <option value="">Pilih OPD</option>
                    @foreach($instansis as $instansi)
                    <option value="{{ $instansi->id }}">
                        {{ $instansi->name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label">Lokasi</label>
                <select
                    name="location"
                    id="location"
                    class="form-control"
                    required
                >
                    <option value="">Pilih Lokasi</option>
                </select>
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label">Tim</label>
                <select name="tim[]" class="form-control" required multiple>
                    <option value="">Pilih Tim</option>
                    @foreach($tims as $tim)
                    <option value="{{ $tim->id }}">{{ $tim->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label">Start</label>
                <input
                    type="datetime-local"
                    name="start"
                    class="form-control"
                    required
                />
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label">End</label>
                <input
                    type="datetime-local"
                    name="end"
                    class="form-control"
                    required
                />
            </div>
            <div class="col-lg-6 mb-4">
                <label class="form-label">ISP</label>
                <select name="isp" class="form-control" required>
                    <option value="">Pilih ISP</option>
                    <option value="Telkom">Telkom</option>
                    <option value="Nexa">Nexa</option>
                    <option value="Lintasarta">Lintasarta</option>
                    <option value="Joule">Joule</option>
                </select>
            </div>
            <div class="col-lg-12">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetch(
            "https://www.emsifa.com/api-wilayah-indonesia/api/regencies/33.json"
        )
            .then((response) => response.json())
            .then((data) => {
                const locationSelect = document.getElementById("location");
                data.forEach((region) => {
                    const option = document.createElement("option");
                    option.value = region.name;
                    option.textContent = region.name;
                    locationSelect.appendChild(option);
                });
            })
            .catch((error) =>
                console.error("Error fetching location data:", error)
            );
    });
</script>
@endsection
