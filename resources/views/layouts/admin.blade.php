<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!-- font google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <!-- end font google -->

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" />
    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="//cdn.datatables.net/2.1.3/css/dataTables.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.bootstrap5.css">
</head>

<body>
    {{-- @include('layouts.nav.nav-bar') --}}
    <section class="container-fluid">
        <div class="row">
            @include('layouts.nav.side-bar')
            <div class="col-lg-9 nav-container">
                <div class="container py-4">
                    <div class="d-flex nav-header justify-content-end align-items-center h-100">
                        <div class="nav-mobile d-none">
                            <nav class="navbar bg-body-tertiary">
                                <div>
                                    <button class="navbar-toggler nav-button" type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                                        aria-label="Toggle navigation">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-menu h-5 w-5">
                                            <line x1="4" x2="20" y1="12" y2="12"></line>
                                            <line x1="4" x2="20" y1="6" y2="6"></line>
                                            <line x1="4" x2="20" y1="18" y2="18"></line>
                                        </svg>
                                    </button>
                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                                        aria-labelledby="offcanvasNavbarLabel">
                                        <div class="offcanvas-header">
                                            <a href="">
                                                <img src="{{ asset('image/logo.png') }}" alt=""
                                                    height="40px" />
                                            </a>
                                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="offcanvas-body">
                                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 gap-3">
                                                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                                                    <a class="nav-link d-flex gap-3 align-items-center fw-medium"
                                                        href="/dashboard">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="currentColor" class="bi bi-house-door"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                                                        </svg>
                                                        <span>Dashboard</span>
                                                    </a>
                                                </li>
                                                <li
                                                    class="nav-item {{ Request::is('dashboard/events*') ? 'active' : '' }}">
                                                    <a class="nav-link d-flex gap-3 align-items-center fw-medium"
                                                        href="/dashboard/events">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="currentColor" class="bi bi-calendar"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                                                        </svg>
                                                        <span>Acara</span>
                                                    </a>
                                                </li>

                                                <!-- ADMIN MENU -->
                                                @if (Auth::user()->role === 'ADMIN')
                                                    <li
                                                        class="nav-item {{ Request::is('dashboard/opd*') ? 'active' : '' }}">
                                                        <a class="nav-link d-flex gap-3 align-items-center fw-medium"
                                                            href="/dashboard/opd">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="currentColor"
                                                                class="bi bi-building" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                                                                <path
                                                                    d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z" />
                                                            </svg>
                                                            <span>Instansi</span>
                                                        </a>
                                                    </li>
                                                    <li
                                                        class="nav-item {{ Request::is('dashboard/isp*') ? 'active' : '' }}">
                                                        <a class="nav-link d-flex gap-3 align-items-center fw-medium"
                                                            href="/dashboard/isp">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="currentColor"
                                                                class="bi bi-globe2" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855q-.215.403-.395.872c.705.157 1.472.257 2.282.287zM4.249 3.539q.214-.577.481-1.078a7 7 0 0 1 .597-.933A7 7 0 0 0 3.051 3.05q.544.277 1.198.49zM3.509 7.5c.036-1.07.188-2.087.436-3.008a9 9 0 0 1-1.565-.667A6.96 6.96 0 0 0 1.018 7.5zm1.4-2.741a12.3 12.3 0 0 0-.4 2.741H7.5V5.091c-.91-.03-1.783-.145-2.591-.332M8.5 5.09V7.5h2.99a12.3 12.3 0 0 0-.399-2.741c-.808.187-1.681.301-2.591.332zM4.51 8.5c.035.987.176 1.914.399 2.741A13.6 13.6 0 0 1 7.5 10.91V8.5zm3.99 0v2.409c.91.03 1.783.145 2.591.332.223-.827.364-1.754.4-2.741zm-3.282 3.696q.18.469.395.872c.552 1.035 1.218 1.65 1.887 1.855V11.91c-.81.03-1.577.13-2.282.287zm.11 2.276a7 7 0 0 1-.598-.933 9 9 0 0 1-.481-1.079 8.4 8.4 0 0 0-1.198.49 7 7 0 0 0 2.276 1.522zm-1.383-2.964A13.4 13.4 0 0 1 3.508 8.5h-2.49a6.96 6.96 0 0 0 1.362 3.675c.47-.258.995-.482 1.565-.667m6.728 2.964a7 7 0 0 0 2.275-1.521 8.4 8.4 0 0 0-1.197-.49 9 9 0 0 1-.481 1.078 7 7 0 0 1-.597.933M8.5 11.909v3.014c.67-.204 1.335-.82 1.887-1.855q.216-.403.395-.872A12.6 12.6 0 0 0 8.5 11.91zm3.555-.401c.57.185 1.095.409 1.565.667A6.96 6.96 0 0 0 14.982 8.5h-2.49a13.4 13.4 0 0 1-.437 3.008M14.982 7.5a6.96 6.96 0 0 0-1.362-3.675c-.47.258-.995.482-1.565.667.248.92.4 1.938.437 3.008zM11.27 2.461q.266.502.482 1.078a8.4 8.4 0 0 0 1.196-.49 7 7 0 0 0-2.275-1.52c.218.283.418.597.597.932m-.488 1.343a8 8 0 0 0-.395-.872C9.835 1.897 9.17 1.282 8.5 1.077V4.09c.81-.03 1.577-.13 2.282-.287z" />
                                                            </svg>
                                                            <span>ISP</span>
                                                        </a>
                                                    </li>
                                                    <li
                                                        class="nav-item {{ Request::is('dashboard/teams*') ? 'active' : '' }}">
                                                        <a class="nav-link d-flex gap-3 align-items-center fw-medium"
                                                            href="/dashboard/teams">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="currentColor"
                                                                class="bi bi-people" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4" />
                                                            </svg>
                                                            <span>Tim</span>
                                                        </a>
                                                    </li>
                                                    <li
                                                        class="nav-item {{ Request::is('dashboard/user*') ? 'active' : '' }}">
                                                        <a class="nav-link d-flex gap-3 align-items-center fw-medium"
                                                            href="/dashboard/user">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" fill="currentColor"
                                                                class="bi bi-person" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                                            </svg>
                                                            <span>User</span>
                                                        </a>
                                                    </li>
                                                @endif
                                                <!-- END ADMIN MENU -->
                                                <li
                                                    class="nav-item {{ Request::is('dashboard/setting') ? 'active' : '' }}">
                                                    <a class="nav-link d-flex gap-3 align-items-center fw-medium"
                                                        href="/dashboard/setting">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="currentColor" class="bi bi-gear"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
                                                            <path
                                                                d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
                                                        </svg>
                                                        <span>Pengaturan</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <div class="dropdown">
                            <button class="border-0 bg-transparent d-flex align-items-center h-100" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="d-flex align-items-center gap-1">
                                    <p class="fw-bold username mb-0 me-2" id="user-name">{{ auth()->user()->name }}</p>
                                    <div class="avatar d-flex align-items-center justify-content-center"
                                        id="user-avatar">
                                        <p id="user-initials" class="mb-0"></p>
                                    </div>
                                </div>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="mb-1">
                                    <a class="dropdown-item fw-medium" id="user-name">{{ auth()->user()->name }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item px-2" href="/dashboard/setting">Setting</a>
                                </li>
                                <hr class="m-0 my-2" />
                                <li>
                                    <a class="dropdown-item">
                                        <form action="{{ route('logout') }}" method="POST" class="d-inline p-0">
                                            @csrf
                                            <button type="submit" class="border-0 bg-transparent logout-item">
                                                Logout
                                            </button>
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @yield('container')
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- Data Tables -->
    <script src="//cdn.datatables.net/2.1.3/js/dataTables.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- FullCalendar JS -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @stack('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fungsi untuk menghasilkan fallback name
            function generateFallbackFromName(name) {
                const parts = name.split(" ").map(word => word[0]);
                return parts.slice(0, 2).join("");
            }

            // Ambil nama pengguna dari elemen HTML
            const userNameElement = document.getElementById('user-name');
            if (userNameElement) {
                const userName = userNameElement.textContent.trim();
                const fallbackName = generateFallbackFromName(userName);

                // Tampilkan fallback name di elemen avatar
                const userAvatarElement = document.getElementById('user-initials');
                if (userAvatarElement) {
                    userAvatarElement.textContent = fallbackName; // Menampilkan fallback name di dalam p
                }
            }

            var successMessage = "{{ session('success') }}";
            if (successMessage) {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: successMessage,
                });
            }

            document.querySelectorAll(".button-action-delete").forEach(function(button) {
                button.addEventListener("click", function(event) {
                    event.preventDefault();

                    Swal.fire({
                        title: "Anda yakin?",
                        text: "Anda tidak akan bisa membatalkan ini!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#f33f40",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, Hapus!",
                        cancelButtonText: "Batal",
                    }).then((result) => {
                        if (result.isConfirmed) {
                            button.closest("form").submit();
                        }
                    });
                });
            });

            var calendarEl = document.getElementById("calendar");
            if (calendarEl) {
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: "dayGridMonth",
                    headerToolbar: {
                        left: "prev,next today",
                        center: "title",
                        right: "dayGridMonth,timeGridWeek",
                    },
                    events: function(info, successCallback, failureCallback) {
                        fetch("/api/events")
                            .then((response) => response.json())
                            .then((data) => {
                                const events = data.map((event) => ({
                                    id: event.id,
                                    title: event.name,
                                    start: event.start,
                                    end: event.end,
                                }));
                                successCallback(events);
                            })
                            .catch((error) => {
                                console.error("Error fetching events:", error);
                                failureCallback(error);
                            });
                    },
                    eventContent: function(arg) {
                        return {
                            html: `<div class="custom-event-title">${arg.event.title}</div>`,
                        };
                    },
                    eventClick: function(info) {
                        var eventId = info.event.id;
                        window.location.href = "/dashboard/events/details/" + eventId;
                    },
                });
                calendar.render();
            }

            $('select[name="location"]').select2({
                placeholder: "Pilih Lokasi",
                allowClear: true,
            });

            $('select[name="opd_id"]').select2({
                placeholder: "Pilih Instansi",
                allowClear: true,
            });

            $('select[name="tim[]"]').select2({
                placeholder: "Pilih Tim",
                allowClear: true,
            });

            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        });

        let currentDateTime = new Date("{{ \Carbon\Carbon::now()->toIso8601String() }}");

        function updateDateTime() {
            currentDateTime.setSeconds(currentDateTime.getSeconds() + 1);
            const options = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const formattedDate = currentDateTime.toLocaleDateString('id-ID', options);
            const time = currentDateTime.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });

            document.getElementById("currentDateTime").textContent = `${formattedDate}, ${time}`;
        }

        updateDateTime();
        setInterval(updateDateTime, 1000);

        $('#search').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
                url: "{{ route('user.search') }}", // Sesuaikan dengan route pencarian
                type: "GET",
                data: {'search': query},
                success: function(data) {
                    $('#userTable').html(data); // Ganti isi tabel
                }
            });
        });
    </script>
</body>

</html>
