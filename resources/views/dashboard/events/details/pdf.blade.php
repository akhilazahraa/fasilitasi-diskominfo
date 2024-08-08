<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        * {
            font-family: Arial, sans-serif;
        }

        .kop-surat {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .alamat {
            font-size: 14px;
        }

        .kop-surat img {
            max-width: 100px;
        }

        .divider {
            border-top: 2px solid #000;
            margin: 20px 0;
        }

        .heading {
            font-size: 18px;
        }

        .date {
            font-size: 14px;
        }

        .text-muted {
            color: rgba(33, 37, 41, 0.75)
        }

        .d-flex {
            display: flex !important;
        }
    </style>
</head>

<body>
    <div class="kop-surat">
        {{-- <div class="col">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Coat_of_arms_of_Central_Java.svg/789px-Coat_of_arms_of_Central_Java.svg.png"
                alt="">
        </div> --}}
        <div class="text-center">
            <h4 class="fw-bold mb-1">PEMERINTAH PROVINSI JAWA TENGAH</h4>
            <h2 class="fw-bold mb-2">DINAS KOMUNIKASI DAN INFORMATIKA</h2>
            <div class="alamat">
                <p class="mb-0">Jalan Menteri Supeno I Nomor 2 Semarang 50234</p>
                <p class="mb-0">Telepone 024-8319140 Faksimile (024)8319328</p>
                <p class="mb-0">
                    Laman:
                    <a href="http://diskominfo.jatengprov.go.id">http://diskominfo.jatengprov.go.id</a>
                    Surat Elektronik:
                    <a href="mailto:diskominfo@jatengprov.go.id">diskominfo@jatengprov.go.id</a>
                </p>
            </div>
        </div>
    </div>
    <div class="divider"></div>
    <div class="mb-4">
        <div class="text-center">
            <h4 class="fw-bold">LAPORAN PELAKSANAAN FASILITASI</h4>
            <h4 class="fw-bold text-uppercase">{{ $event->instansi->name }}</h4>
        </div>
    </div>
    <table class="table table-borderless">
        <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody style="line-height: 2.5">
            <tr>
                <td>Nama Kegiatan</td>
                <td>: {{ $event->name }}</td>
            </tr>
            <tr>
                <td>OPD</td>
                <td>: {{ $event->instansi->name }}</td>
            </tr>
            <tr>
                <td>ISP</td>
                <td>: {{ $event->providers->name }}</td>
            </tr>
            <tr>
                <td>Waktu Pelaksanaan</td>
                <td>: {{ \Carbon\Carbon::parse($event->start)->locale('id')->translatedFormat('l, d F Y, H:i') }}</td>
            </tr>
            <tr>
                <td>Lokasi</td>
                <td>: {{ $event->location }}<</td>
            </tr>
            <tr>
                <td>Jam</td>
                <td>: {{ \Carbon\Carbon::parse($event->start)->locale('id')->translatedFormat('H:i') }}
                    - Selesai<</td>
            </tr>
            <tr>
                <td>Tim Pelaksana</td>
                <td><ol>
                    @foreach ($event->tims as $tim)
                        <li>{{ $tim->name }}</li>
                    @endforeach
                </ol></td>
            </tr>
        </tbody>
    </table>
    {{-- <section>
        <ol>
            <li>
                <div class="d-flex justify-content-between">
                    <p>Nama Kegiatan :</p>
                    <p>{{ $event->name }}</p>
                </div>
            </li>
            <li>
                <div class="d-flex">
                    <p>OPD :</p>
                    <p>{{ $event->instansi->name }}</p>
                </div>
            </li>
            <li>
                <div class="d-flex">
                    <p>ISP :</p>
                    <p>{{ $event->providers->name }}</p>
                </div>
            </li>
            <li>
                <div class="d-flex">
                    <p>Pelaksanaan Kegiatan :</p>
                    <ol type="a">
                        <li>
                            <div>
                                <p>Waktu Pelaksanaan :</p>
                                <p>{{ \Carbon\Carbon::parse($event->start)->locale('id')->translatedFormat('l, d F Y, H:i') }}
                                </p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <p>Lokasi :</p>
                                <p>{{ $event->location }}</p>
                            </div>
                        </li>
                        <li>
                            <div>
                                <p>Jam :</p>
                                <p>{{ \Carbon\Carbon::parse($event->start)->locale('id')->translatedFormat('H:i') }}
                                    - Selesai</p>
                            </div>
                        </li>
                    </ol>
                </div>
            </li>
            <li>
                <div class="d-flex">
                    <p>Tim Pelaksana :</p>
                    <ol type="a">
                        @foreach ($event->tims as $tim)
                            <li>{{ $tim->name }}</li>
                        @endforeach
                    </ol>
                </div>
            </li>
        </ol>
    </section> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
