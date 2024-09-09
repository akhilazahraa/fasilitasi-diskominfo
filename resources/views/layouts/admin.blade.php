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
            <div class="col-lg-9">
                <div class="container py-4">
                    <div class="d-flex justify-content-end">
                        <div class="dropdown">
                            <button class="border-0 bg-transparent d-flex align-items-center h-100" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <div class="d-flex align-items-center gap-1">
                                    <p class="fw-bold mb-0 me-2" id="user-name">{{ auth()->user()->name }}</p>
                                    <div class="avatar d-flex align-items-center justify-content-center" id="user-avatar">
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
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
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
    </script>
</body>

</html>
