@extends('layouts.admin') @section('container')
<div class="content-wrapper py-4">
    <div class="heading mb-4">
        <h1>Dashboard</h1>
    </div>
    <div class="mb-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="card border">
                    <p class="text-primary fw-medium mb-2">
                        SEDANG BERLANGSUNG
                    </p>
                    <h4 class="fw-semibold">{{ $ongoing }}</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border">
                    <p class="text-primary fw-medium mb-2">BELUM MULAI</p>
                    <h4 class="fw-semibold">{{ $notstarted }}</h4>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border">
                    <p class="text-primary fw-medium mb-2">SELESAI</p>
                    <h4 class="fw-semibold">{{ $end }}</h4>
                </div>
            </div>
            <div class="col-lg-6 mt-4">
                <div class="card border">
                    <p class="text-primary fw-medium mb-2">ISP</p>
                    <div class="d-flex justify-content-center">
                        <canvas id="pieChart" class="pie-chart"></canvas>
                    </div>
                    <!-- Hidden elements to store ISP data -->
                    <div id="isp-data" style="display: none">
                        @foreach($ispCounts as $ispCount)
                        <span class="isp-label">{{ $ispCount->isp_name }}</span>
                        <span class="isp-count">{{ $ispCount->count }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card border">
        <div id="calendar"></div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ispDataElement = document.getElementById("isp-data");
        const ispLabels = Array.from(
            ispDataElement.getElementsByClassName("isp-label")
        ).map((el) => el.textContent);
        const ispCounts = Array.from(
            ispDataElement.getElementsByClassName("isp-count")
        ).map((el) => parseInt(el.textContent));

        new Chart(document.getElementById("pieChart").getContext("2d"), {
            type: "doughnut",
            data: {
                labels: ispLabels,
                datasets: [
                    {
                        label: "Count",
                        data: ispCounts,
                        backgroundColor: [
                            "rgb(255, 99, 132)",
                            "rgb(54, 162, 235)",
                            "rgb(255, 205, 86)",
                            "rgb(70, 120, 240)",
                        ],
                        hoverOffset: 4,
                    },
                ],
            },
        });
    });
</script>
@endpush @endsection
