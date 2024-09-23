<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Fasilitasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" href="{{ asset('image/jateng.png') }}" type="image/png">
    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- end font google -->
</head>

<body class="bg-primary">
    <header>
        <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary bg-primary">
            <div class="container d-flex justify-content-between">
                <a class="navbar-brand" href="#"><img src="{{ asset('image/jateng.png') }}" alt=""
                        height="40px" /></a>
                <button class="navbar-toggler nav-button-home" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-menu h-5 w-5">
                        <line x1="4" x2="20" y1="12" y2="12"></line>
                        <line x1="4" x2="20" y1="6" y2="6"></line>
                        <line x1="4" x2="20" y1="18" y2="18"></line>
                    </svg>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav nav-home ms-auto gap-lg-4">
                        <a class="nav-link" href="#">Apps</a>
                        <a class="nav-link" href="#">Team</a>
                        <a class="nav-link" href="#">FAQ</a>
                    </div>
                    <div class="navbar-nav nav-home ms-auto gap-4">
                        <a class="button-white" href="/login">Masuk</a>
                    </div>
                </div>
        </nav>
    </header>
    <section
        class="position-relative bg-primary text-white hero d-flex flex-column justify-content-center align-items-center">
            <div class="text-center jumbotron" style="margin-bottom: 18rem">
                <h1 class="fs-2 font-semibold lh-base mb-4" data-aos="fade-down" data-aos-duration="1000">Menuju Jawa Tengah Sejahtera <br> dan Berdikari Bersama
                    E-Fasilitasi</h1>
                <p class="text-sm lh-base text-secondary" style="margin-bottom: 2rem" data-aos-delay="300" data-aos="fade-down" data-aos-duration="1000">Lorem, ipsum dolor sit amet
                    consectetur adipisicing elit. Saepe velit placeat, esse rerum quaerat earum ex dolorem libero itaque
                    blanditiis beatae.</p>
                <a href="/login" class="button-secondary" data-aos-delay="500" data-aos="fade-down" data-aos-duration="1000">Coba Sekarang</a>
            </div>
            <div class="position-absolute bottom-0">
                <img src="{{ asset('image/asset.png') }}" class="asset" alt="" height="300px" data-aos-delay="700" data-aos="fade-up" data-aos-offset="0" data-aos-duration="1000"/>
            </div>
    </section>

    <section class="section bg-white">
        <div class="container">
            <div class="text-center head-content">
                <h1 class="fs-4 fw-bold text-primary" data-aos="fade-down" data-aos-duration="1000">Fitur E-Fasilitasi</h1>
                <p class="text-muted-foreground"  data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">Menghadirkan fitur untuk mendukung kegiatan fasilitasi.</p>
            </div>
            <div class="d-flex flex-column flex-lg-row gap-4 w-full">
                <div class="col-lg-4 card-secondary" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="500">
                    <div>
                        <div class="icons p-4 rounded-4 bg-primary d-flex justify-content-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5"/>
                                <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                              </svg>
                        </div>
                        <h1 class="fs-5 fw-semibold">Manajemen Kegiatan</h1>
                        <p class="text-muted-foreground">Membuat, mengelola, dan mendokumentasikan setiap kegiatan
                            fasilitasi</p>
                    </div>
                </div>
                <div class="col-lg-4 card-secondary" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="700">
                    <div>
                        <div class="icons p-4 rounded-4 bg-primary d-flex justify-content-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                              </svg>
                        </div>
                        <h1 class="fs-5 fw-semibold">Integrasi Kalender</h1>
                        <p class="text-muted-foreground">Menjadwalkan kegiatan fasilitasi dengan tampilan kalender
                            interaktif</p>
                    </div>
                </div>
                <div class="col-lg-4 card-secondary" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="900">
                    <div>
                        <div class="icons p-4 rounded-4 bg-primary d-flex justify-content-center mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" class="bi bi-file-bar-graph" viewBox="0 0 16 16">
                                <path d="M4.5 12a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5zm3 0a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5zm3 0a.5.5 0 0 1-.5-.5v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5z"/>
                                <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1"/>
                              </svg>
                        </div>
                        <h1 class="fs-5 fw-semibold">Pelaporan dan Analisis Data</h1>
                        <p class="text-muted-foreground">Menyediakan laporan berbasis data terkait jumlah dan jenis
                            kegiatan yang telah dilakukan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-white">
        <div class="container">
            <div class="d-lg-flex gap-4">
                <div class="col-lg-6 d-flex flex-column mb-4 mb-lg-0">
                    <span class="fw-semibold mb-3" data-aos="fade-right" data-aos-duration="1000">ABOUT</span>
                    <h1 class="fw-bold fs-3 mb-4 text-primary" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="300">Sistem Informasi E-Fasilitasi berbasis website?</h1>
                    <p class="text-muted-foreground mb-4 lh-lg"  data-aos="fade-right" data-aos-duration="1000" data-aos-delay="500">
                        Aplikasi E-Fasilitasi merupakan sistem informasi berbasis website yang dibuat oleh tim magang
                        Universitas Diponegoro di Diskominfo Provinsi Jawa Tengah. Aplikasi tersebut menghadirkan
                        beberapa fitur utama, seperti manajemen fasilitasi, integrasi kalender, dan pelaporan serta
                        analisis data.
                    </p>
                    <a href="/login" class="button-secondary" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="700">Coba Sekarang</a>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.122241646346!2d110.41594037531785!3d-6.99488149300619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b5d9471b3e5%3A0x3fe7ccb54333b13!2sDinas%20Komunikasi%20dan%20Informatika%20Jawa%20Tengah!5e0!3m2!1sen!2sid!4v1725894100400!5m2!1sen!2sid"
                        class="rounded-4" width="100%" height="450" style="border:0;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-primary">
        <div class="container d-flex justify-content-center">
            <div class="text-center text-white py-4 banner" style="max-width: 40%">
                <h1 class="fs-3 fw-bold" style="margin-bottom: 2rem" data-aos="fade-down" data-aos-duration="1000">E-Fasilitasi Hadir!</h1>
                <p class="text-secondary" style="margin-bottom: 2rem" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur
                    adipisicing elit. Labore fugit distinctio eligendi accusantium, provident excepturi officiis? Quas,
                    optio repellat eos error ipsa.</p>
                <a href="/login" class="button-secondary" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">Coba Sekarang</a>
            </div>
        </div>
    </section>

    <section class="section bg-white">
        <div class="container">
            <div class="text-center head-content">
                <h1 class="fs-4 fw-bold text-primary" data-aos="fade-down" data-aos-duration="1000">Meet Our Team</h1>
                <p class="text-muted-foreground" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100">Dibalik layar aplikasi E-Fasilitasi.</p>
            </div>
            <div class="d-flex flex-column flex-lg-row gap-4 w-full">
                <div class="col-lg-3 card-secondary" data-aos="fade-down" data-aos-duration="1000">
                    <div class="text-center">
                        <img src="{{ asset('image/kai.png') }}" alt="" height="150px" class="mb-4" />
                        <h1 class="fs-6 fw-semibold">Khairun Nisa</h1>
                        <p class="text-muted-foreground">UI/UX Designer</p>
                    </div>
                </div>
                <div class="col-lg-3 card-secondary" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">
                    <div class="text-center">
                        <img src="{{ asset('image/khila.png') }}" alt="" height="150px" class="mb-4" />
                        <h1 class="fs-6 fw-semibold">Akhila Zahra</h1>
                        <p class="text-muted-foreground">Frontend Developer</p>
                    </div>
                </div>
                <div class="col-lg-3 card-secondary" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="500">
                    <div class="text-center">
                        <img src="{{ asset('image/nofi.png') }}" alt="" height="150px" class="mb-4" />
                        <h1 class="fs-6 fw-semibold">Nofia Nur Khasanah</h1>
                        <p class="text-muted-foreground">Frontend Developer</p>
                    </div>
                </div>
                <div class="col-lg-3 card-secondary" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="700">
                    <div class="text-center">
                        <img src="{{ asset('image/brilly.png') }}" alt="" height="150px" class="mb-4" />
                        <h1 class="fs-6 fw-semibold">Muhammad Ahib Ibrilli
                        </h1>
                        <p class="text-muted-foreground">Backend Developer</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section bg-primary">
        <div class="container">
            <div class="d-flex justify-content-center mb-4">
                <img src="{{ asset('image/jateng.png') }}" alt="" height="40px" />
            </div>
            <div class="d-flex text-center justify-content-center text-white gap-4">
                <a class="nav-link" href="#">Apps</a>
                <a class="nav-link" href="#">Team</a>
                <a class="nav-link" href="#">FAQ</a>
            </div>
            <div class="py-4">
                <hr>
            </div>
            <div class="text-center text-white text-sm">
                <p>© 2024 E-Fasilitasi</p>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
      </script>
</body>

</html>
