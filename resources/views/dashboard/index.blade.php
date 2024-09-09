@extends('layouts.admin') @section('container')
    <div class="content-wrapper py-4">
        <div class="heading mb-4">
            <h1 class="fs-2">Dashboard</h1>
            <p id="currentDateTime" class="text-muted-foreground">
            </p>
        </div>
        <div class="mb-4">
            <div class="row card-dashboard-container">
                <div class="col-lg-4">
                    <div class="card position-relative border">
                        <p class="fw-semibold mb-2 text-primary">
                            SEDANG BERLANGSUNG
                        </p>
                        <h4 class="fw-bold">{{ $ongoing }}</h4>
                        <div class="position-absolute bottom-0 end-0 pb-2">
                            <svg width="122" height="62" viewBox="0 0 122 62" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="text-primary">
                                <path fillRule="evenodd" clipRule="evenodd"
                                    d="M64.6344 0C61.9961 0 59.8573 2.13877 59.8573 4.77707C59.8573 7.41537 61.9961 9.55414 64.6344 9.55414H90.0894C92.7277 9.55414 94.8665 7.41537 94.8665 4.77707C94.8665 2.13877 92.7277 0 90.0894 0H64.6344ZM0.972153 21.0191C0.972153 17.5014 3.82384 14.6497 7.34158 14.6497H121.913V27.3885H93.9708L93.4048 28.115C92.2788 29.5604 92.2788 31.5861 93.4048 33.0315L93.4746 33.121H121.913V42.6752H33.7566C31.1183 42.6752 28.9796 40.5364 28.9796 37.8981C28.9796 35.2598 31.1183 33.121 33.7566 33.121H68.0484L68.1877 32.9299C69.2117 31.5256 69.2117 29.6209 68.1877 28.2166L67.584 27.3885H7.34158C3.82384 27.3885 0.972153 24.5368 0.972153 21.0191ZM6.701 56.3694C6.701 53.7311 8.83977 51.5924 11.4781 51.5924H36.9331C39.5714 51.5924 41.7102 53.7311 41.7102 56.3694C41.7102 59.0077 39.5714 61.1465 36.9331 61.1465H11.4781C8.83977 61.1465 6.701 59.0077 6.701 56.3694ZM52.8526 51.5924C50.2143 51.5924 48.0755 53.7311 48.0755 56.3694C48.0755 59.0077 50.2143 61.1465 52.8526 61.1465H121.913V51.5924H52.8526ZM19.1114 40.3694C20.8691 40.3694 22.294 38.9436 22.294 37.1847C22.294 35.4258 20.8691 34 19.1114 34C17.3537 34 15.9287 35.4258 15.9287 37.1847C15.9287 38.9436 17.3537 40.3694 19.1114 40.3694Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card position-relative border">
                        <p class="fw-semibold mb-2 text-primary">BELUM MULAI</p>
                        <h4 class="fw-bold">{{ $notstarted }}</h4>
                        <div class="position-absolute bottom-0 end-0 pb-2">
                            <svg width="122" height="62" viewBox="0 0 122 62" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="text-primary">
                                <path fillRule="evenodd" clipRule="evenodd"
                                    d="M64.6344 0C61.9961 0 59.8573 2.13877 59.8573 4.77707C59.8573 7.41537 61.9961 9.55414 64.6344 9.55414H90.0894C92.7277 9.55414 94.8665 7.41537 94.8665 4.77707C94.8665 2.13877 92.7277 0 90.0894 0H64.6344ZM0.972153 21.0191C0.972153 17.5014 3.82384 14.6497 7.34158 14.6497H121.913V27.3885H93.9708L93.4048 28.115C92.2788 29.5604 92.2788 31.5861 93.4048 33.0315L93.4746 33.121H121.913V42.6752H33.7566C31.1183 42.6752 28.9796 40.5364 28.9796 37.8981C28.9796 35.2598 31.1183 33.121 33.7566 33.121H68.0484L68.1877 32.9299C69.2117 31.5256 69.2117 29.6209 68.1877 28.2166L67.584 27.3885H7.34158C3.82384 27.3885 0.972153 24.5368 0.972153 21.0191ZM6.701 56.3694C6.701 53.7311 8.83977 51.5924 11.4781 51.5924H36.9331C39.5714 51.5924 41.7102 53.7311 41.7102 56.3694C41.7102 59.0077 39.5714 61.1465 36.9331 61.1465H11.4781C8.83977 61.1465 6.701 59.0077 6.701 56.3694ZM52.8526 51.5924C50.2143 51.5924 48.0755 53.7311 48.0755 56.3694C48.0755 59.0077 50.2143 61.1465 52.8526 61.1465H121.913V51.5924H52.8526ZM19.1114 40.3694C20.8691 40.3694 22.294 38.9436 22.294 37.1847C22.294 35.4258 20.8691 34 19.1114 34C17.3537 34 15.9287 35.4258 15.9287 37.1847C15.9287 38.9436 17.3537 40.3694 19.1114 40.3694Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card position-relative border">
                        <p class="fw-semibold mb-2 text-primary">SELESAI</p>
                        <h4 class="fw-bold">{{ $end }}</h4>
                        <div class="position-absolute bottom-0 end-0 pb-2">
                            <svg width="122" height="62" viewBox="0 0 122 62" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="text-primary">
                                <path fillRule="evenodd" clipRule="evenodd"
                                    d="M64.6344 0C61.9961 0 59.8573 2.13877 59.8573 4.77707C59.8573 7.41537 61.9961 9.55414 64.6344 9.55414H90.0894C92.7277 9.55414 94.8665 7.41537 94.8665 4.77707C94.8665 2.13877 92.7277 0 90.0894 0H64.6344ZM0.972153 21.0191C0.972153 17.5014 3.82384 14.6497 7.34158 14.6497H121.913V27.3885H93.9708L93.4048 28.115C92.2788 29.5604 92.2788 31.5861 93.4048 33.0315L93.4746 33.121H121.913V42.6752H33.7566C31.1183 42.6752 28.9796 40.5364 28.9796 37.8981C28.9796 35.2598 31.1183 33.121 33.7566 33.121H68.0484L68.1877 32.9299C69.2117 31.5256 69.2117 29.6209 68.1877 28.2166L67.584 27.3885H7.34158C3.82384 27.3885 0.972153 24.5368 0.972153 21.0191ZM6.701 56.3694C6.701 53.7311 8.83977 51.5924 11.4781 51.5924H36.9331C39.5714 51.5924 41.7102 53.7311 41.7102 56.3694C41.7102 59.0077 39.5714 61.1465 36.9331 61.1465H11.4781C8.83977 61.1465 6.701 59.0077 6.701 56.3694ZM52.8526 51.5924C50.2143 51.5924 48.0755 53.7311 48.0755 56.3694C48.0755 59.0077 50.2143 61.1465 52.8526 61.1465H121.913V51.5924H52.8526ZM19.1114 40.3694C20.8691 40.3694 22.294 38.9436 22.294 37.1847C22.294 35.4258 20.8691 34 19.1114 34C17.3537 34 15.9287 35.4258 15.9287 37.1847C15.9287 38.9436 17.3537 40.3694 19.1114 40.3694Z"
                                    fill="currentColor" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-4">
                    <div class="card border">
                        <p class="fw-semibold text-primary mb-2">ISP</p>
                        <div class="d-flex justify-content-center">
                            <canvas id="pieChart" class="pie-chart"></canvas>
                        </div>
                        <!-- Hidden elements to store ISP data -->
                        <div id="isp-data" style="display: none">
                            @foreach ($ispCounts as $ispCount)
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
            document.addEventListener("DOMContentLoaded", function() {
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
                        datasets: [{
                            label: "Count",
                            data: ispCounts,
                            backgroundColor: [
                                "rgb(255, 99, 132)",
                                "rgb(54, 162, 235)",
                                "rgb(255, 205, 86)",
                                "rgb(70, 120, 240)",
                            ],
                            hoverOffset: 4,
                        }, ],
                    },
                });
            });
        </script>
    @endpush
@endsection
