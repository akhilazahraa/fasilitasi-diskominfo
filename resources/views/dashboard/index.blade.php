@extends('layouts.admin') @section('container')
<div class="content-wrapper py-4">
    <div class="mb-4">
        <h4 class="fw-semibold">Selamat Datang di Dashboard</h4>
    </div>
    <div class="mb-4">
        <div class="row">
            <div class="col-lg-4">
                <div class="card border">
                    <p class="text-primary fw-medium mb-2">
                        SEDANG BERLANGSUNG
                    </p>
                    <h4 class="fw-semibold">{{ $ongoing }}</h4>
                    <canvas id="chartSedangBerlangsung" class="chart"></canvas>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border">
                    <p class="text-primary fw-medium mb-2">BELUM MULAI</p>
                    <h4 class="fw-semibold">{{ $notstarted }}</h4>
                    <canvas id="chartBelumMulai" class="chart"></canvas>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border">
                    <p class="text-primary fw-medium mb-2">SELESAI</p>
                    <h4 class="fw-semibold">{{ $end }}</h4>
                    <canvas id="chartSelesai" class="chart"></canvas>
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

        new Chart(
            document.getElementById("chartSedangBerlangsung").getContext("2d"),
            {
                type: "line",
                data: {
                    labels: [
                        "January",
                        "February",
                        "March",
                        "April",
                        "May",
                        "June",
                        "July",
                    ],
                    datasets: [
                        {
                            label: "Data Sedang Berlangsung",
                            data: [12, 19, 3, 5, 2, 3, 7],
                            borderColor: "rgba(75, 192, 192, 1)",
                            backgroundColor: "rgba(75, 192, 192, 0.2)",
                            fill: true,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false }, // Sembunyikan legenda
                        tooltip: { enabled: false }, // Sembunyikan tooltip
                    },
                    scales: {
                        x: { display: false }, // Sembunyikan sumbu X
                        y: { display: false }, // Sembunyikan sumbu Y
                    },
                },
            }
        );

        new Chart(document.getElementById("chartBelumMulai").getContext("2d"), {
            type: "line",
            data: {
                labels: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                ],
                datasets: [
                    {
                        label: "Data Belum Mulai",
                        data: [5, 12, 6, 9, 8, 11, 15],
                        borderColor: "rgba(153, 102, 255, 1)",
                        backgroundColor: "rgba(153, 102, 255, 0.2)",
                        fill: true,
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: false },
                },
                scales: {
                    x: { display: false },
                    y: { display: false },
                },
            },
        });

        new Chart(document.getElementById("chartSelesai").getContext("2d"), {
            type: "line",
            data: {
                labels: [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                ],
                datasets: [
                    {
                        label: "Data Selesai",
                        data: [3, 5, 2, 8, 7, 10, 12],
                        borderColor: "rgba(255, 99, 132, 1)",
                        backgroundColor: "rgba(255, 99, 132, 0.2)",
                        fill: true,
                    },
                ],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }, // Sembunyikan legenda
                    tooltip: { enabled: false }, // Sembunyikan tooltip
                },
                scales: {
                    x: { display: false }, // Sembunyikan sumbu X
                    y: { display: false }, // Sembunyikan sumbu Y
                },
            },
        });
    });
</script>
@endpush @endsection
