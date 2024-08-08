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
    <link href="https://fonts.googleapis.com/css2?family=Paytone+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
                            <button class="border-0 bg-transparent" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="https://prium.github.io/phoenix/v1.18.0/assets/img/team/40x40/57.webp"
                                    alt="" class="rounded-circle" width="45px" />
                            </button>
                            <ul class="dropdown-menu">
                                <li class="px-2 mb-1">
                                    <a class="dropdown-item fw-medium">{{ auth()->user()->name }}</a>
                                </li>
                                <li class="px-2">
                                    <a class="dropdown-item px-2" href="/dashboard/setting">Setting</a>
                                </li>
                                <hr class="m-0 my-2" />
                                <li>
                                    <a class="dropdown-item">
                                        <form action="{{ route('logout') }}" method="POST" class="d-inline p-0">
                                            @csrf
                                            <button type="submit" class="border-0 bg-transparent logout-item px-2">
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
            var successMessage = "{{ session('success') }}";
            console.log("Success message: ", successMessage);
            if (successMessage) {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: successMessage,
                });
            }

            document
                .querySelectorAll(".button-action-delete")
                .forEach(function(button) {
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
                    events: function(
                        info,
                        successCallback,
                        failureCallback
                    ) {
                        fetch("/api/events")
                            .then((response) => response.json())
                            .then((data) => {
                                // Transform data to FullCalendar format if needed
                                const events = data.map((event) => ({
                                    id: event.id,
                                    title: event.name, // Use 'name' from API data
                                    start: event.start,
                                    end: event.end,
                                }));
                                successCallback(events);
                            })
                            .catch((error) => {
                                console.error(
                                    "Error fetching events:",
                                    error
                                );
                                failureCallback(error);
                            });
                    },
                    eventContent: function(arg) {
                        // Create custom HTML for event content
                        return {
                            html: `<div class="custom-event-title">${arg.event.title}</div>`,
                        };
                    },
                    eventClick: function(info) {
                        var eventId = info.event.id;
                        window.location.href =
                            "/dashboard/events/details/" + eventId;
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
            
            $(document).ready( function(){
                $('#myTable').DataTable()
            })
        });
    </script>
</body>

</html>
