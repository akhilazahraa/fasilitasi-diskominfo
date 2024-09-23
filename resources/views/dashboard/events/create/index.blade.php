@extends('layouts.admin') @section('container')
    <div class="heading mb-4">
        <h1 class="fs-2">Tambah Acara</h1>
    </div>
    <div class="content-wrapper">
        <div class="card p-4 border">
            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="row">
                @csrf
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Nama Acara</label>
                    <input type="text" name="name" class="form-control" required />
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Instansi</label>
                    <select name="opd_id" class="form-control" id="opd_id" required>
                        <option value="">Pilih OPD</option>
                        @foreach ($instansis as $instansi)
                            <option value="{{ $instansi->id }}">
                                {{ $instansi->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Lokasi</label>
                    <select name="location" id="location" class="form-control" required>
                        <option value="">Pilih Lokasi</option>
                    </select>
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Detail Lokasi</label>
                    <input type="text" name="details_location" class="form-control" required />
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Tim</label>
                    <select name="tim[]" class="form-control" required multiple>
                        <option value="">Pilih Tim</option>
                        @foreach ($tims as $tim)
                            <option value="{{ $tim->id }}">{{ $tim->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Start</label>
                    <input type="datetime-local" name="start" class="form-control" required />
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">End</label>
                    <input type="datetime-local" name="end" class="form-control" required />
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">ISP</label>
                    <select name="isp_id" class="form-control" required>
                        <option value="">Pilih ISP</option>
                        @foreach ($providers as $providers)
                            <option value="{{ $providers->id }}">
                                {{ $providers->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Documentation (.jpg .jpeg .png)</label>
                    <input type="file" name="documentation" class="form-control" accept=".jpg, .jpeg, .png" required />
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Pilih Status
                        </option>
                        <option value="Onsite">On Site</option>
                        <option value="Oncall">On Call</option>
                    </select>
                </div>
                <div class="col-lg-12 mb-4">
                    <label class="form-label">Kebutuhan</label>
                    <textarea name="kebutuhan" class="form-control" rows="4"></textarea>
                </div>
                <div class="col-lg-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
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
