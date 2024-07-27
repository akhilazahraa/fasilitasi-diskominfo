<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>{{ $title }}</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

        <!-- font google -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
            rel="stylesheet"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
        />
        <!-- end font google -->

        <!-- SweetAlert2 -->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css"
        />
    </head>

    <body>
        {{-- @include('layouts.nav.nav-bar') --}}
        <section class="container-fluid">
            <div class="row">
                @include('layouts.nav.side-bar')
                <div class="col-lg-9">
                    <div class="container py-4">@yield('container')</div>
                </div>
            </div>
        </section>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"
        ></script>
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @stack('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function () {
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
                    .forEach(function (button) {
                        button.addEventListener("click", function (event) {
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
                        events: "/api/events",
                        eventDidMount: function (info) {
                            if (info.event.start) {
                                var eventEl = document.createElement("div");
                                eventEl.className = "custom-event-title";
                                eventEl.innerText = info.event.title;
                                info.el.innerHTML = "";
                                info.el.appendChild(eventEl);
                            }
                        },
                        eventClick: function (info) {
                            var eventId = info.event.id;
                            window.location.href =
                                "/dashboard/events/scheduled/" + eventId;
                        },
                    });
                    calendar.render();
                }
            });
        </script>
    </body>
</html>
