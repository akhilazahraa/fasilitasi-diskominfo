@extends('layouts.admin')
@section('container')
    <div class="heading mb-4">
        <h1 class="fs-2">Edit Events</h1>
    </div>
    <div class="content-wrapper">
        <div class="card p-4 border">
            <form action="{{ route('dashboard.events.update', $event->id) }}" method="POST" class="row"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Nama Acara</label>
                    <input type="text" name="name" value="{{ old('name', $event->name) }}" class="form-control"
                        required />
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Instansi</label>
                    <select name="opd_id" class="form-control" required>
                        @foreach ($instansis as $instansi)
                            <option value="{{ $instansi->id }}"
                                {{ old('opd_id', $event->opd_id) == $instansi->id ? 'selected' : '' }}>
                                {{ $instansi->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Lokasi</label>
                    <select name="location" id="location" class="form-control" required>
                        <option value="{{ $event->location }}" selected>{{ $event->location }}</option>
                    </select>
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Detail Lokasi</label>
                    <input type="text" name="details_location"
                        value="{{ old('details_location', $event->details_location) }}" class="form-control" required />
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Tim</label>
                    <select name="tim[]" class="form-control" required multiple>
                        @foreach ($tims as $tim)
                            <option value="{{ $tim->id }}"
                                {{ in_array($tim->id, $event->tims->pluck('id')->toArray()) ? 'selected' : '' }}>
                                {{ $tim->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Start</label>
                    <input type="datetime-local" name="start" class="form-control"
                        value="{{ old('start', \Carbon\Carbon::parse($event->start)->format('Y-m-d\TH:i')) }}" required />
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">End</label>
                    <input type="datetime-local" name="end" class="form-control"
                        value="{{ old('end', \Carbon\Carbon::parse($event->end)->format('Y-m-d\TH:i')) }}" required />
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">ISP</label>
                    <select name="isp_id" class="form-control" required>
                        <option value="1" {{ old('isp_id', $event->isp_id) == 1 ? 'selected' : '' }}>Telkom</option>
                        <option value="2" {{ old('isp_id', $event->isp_id) == 2 ? 'selected' : '' }}>Nexa
                        </option>
                        <option value="3" {{ old('isp_id', $event->isp_id) == 3 ? 'selected' : '' }}>Lintasarta
                        </option>
                        <option value="4" {{ old('isp_id', $event->isp_id) == 4 ? 'selected' : '' }}>Sijoli</option>
                    </select>
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Documentation</label>
                    <input type="file" name="documentation" class="form-control" accept=".jpg, .jpeg, .png" required />
                </div>
                <div class="col-lg-6 mb-4">
                    <label class="form-label">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="" {{ old('status', $event->status) === '' ? 'selected' : '' }}>Pilih Status
                        </option>
                        <option value="Onsite" {{ old('status', $event->status) === 'Onsite' ? 'selected' : '' }}>On Site
                        </option>
                        <option value="Oncall" {{ old('status', $event->status) === 'Oncall' ? 'selected' : '' }}>On Call
                        </option>
                        <option value="End" {{ old('status', $event->status) === 'End' ? 'selected' : '' }}>End</option>
                    </select>
                </div>
                <div class="col-lg-12 mb-4">
                    <label class="form-label">Kebutuhan</label>
                    <textarea name="kebutuhan" class="form-control" rows="4">{{ old('kebutuhan', $event->kebutuhan) }}</textarea>
                </div>
                <div class="col-lg-12 d-flex justify-content-end">
                    <button class="w-full btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch("https://www.emsifa.com/api-wilayah-indonesia/api/regencies/33.json")
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
                .catch((error) => console.error("Error fetching location data:", error));
        });
    </script>
@endsection
