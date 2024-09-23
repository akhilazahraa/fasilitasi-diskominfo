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
         @page {
            size: A4;
            margin: 15mm 10mm 15mm 10mm;
            margin: 0 0 0;
        }

        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            line-height: 1.3;
            color: #333;
        }

        .title {
            text-align: center;
            margin-bottom: 15px;
        }

        .title h2 {
            margin: 0;
            color: #444;
            font-size: 18px;
        }

        .title h5 {
            margin: 3px 0;
            color: #666;
            font-size: 13px;
        }

        .main-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .main-table th,
        .main-table td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: left;
        }

        .main-table th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 10px;
        }

        .main-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .summary-section {
            margin-top: 20px;
            border-top: 2px solid #444;
            padding-top: 15px;
        }

        .summary-title {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #444;
        }

        .summary-table {
            width: 100%;
            border-collapse: collapse;
        }

        .summary-table td {
            padding: 5px;
            vertical-align: top;
            border: none;
        }

        .summary-label {
            font-weight: bold;
            color: #666;
            font-size: 10px;
        }

        .summary-value {
            color: #333;
            font-size: 11px;
        }

        .text-right {
            text-align: right;
        }

        @media print {
            thead {
                display: table-header-group;
            }
        }

        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        .header {
            width: 100%;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 5px;
        }

        .logo {
            width: 100px;
            height: auto;
        }

        .company-name {
            font-size: 18pt;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .company-address {
            font-size: 10pt;
            line-height: 1.3;
        }

        .document-title {
            font-size: 16pt;
            font-weight: bold;
            margin-top: 15px;
            text-align: center;
        }
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
    <table class="header" cellpadding="0" cellspacing="0">
        <tr>
            <td width="25%" style="vertical-align: top; padding-right: 15px; padding-bottom: 10px">
                <img src="{{ public_path('image/logo.png') }}" alt="Batu Keriting Logo" class="logo">
            </td>
            <td width="75%" style="vertical-align: top;">
                <div class="company-name">PT Batu Rambut Indonesia</div>
                <div class="company-address">
                    Jalan Gundul Perkasa (RT 00/RW 00) No. 404, Kel. Botak Cemerlang,<br>
                    Kec. Bekasi Berkilau, 90210<br>
                    Telp: 0856-BATU-KECE (0856-2288-5323) | Email: info@batukerenrambut.com
                </div>
            </td>
        </tr>
    </table>
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
                <td>Instansi</td>
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
                <td>Detail Lokasi</td>
                <td>: {{ $event->details_location }}<</td>
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
