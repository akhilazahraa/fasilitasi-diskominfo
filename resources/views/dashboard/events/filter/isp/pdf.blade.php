<!DOCTYPE html>
<html>
<head>
    <title>Filter Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <style>
        * { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; font-size: 14px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
        .kop-surat { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
        .alamat { font-size: 14px; }
        .kop-surat img { max-width: 100px; }
        .divider { border-top: 2px solid #000; margin: 20px 0; }
        .heading { font-size: 18px; }
        .date { font-size: 14px; }
    </style>
</head>
<body>
    <div class="kop-surat d-flex">
        <div class="text-center">
            <h4 class="fw-bold">PEMERINTAH PROVINSI JAWA TENGAH</h4>
            <h2 class="fw-bold">DINAS KOMUNIKASI DAN INFORMATIKA</h2>
            <div class="alamat">
                <p class="mb-0">Jalan Menteri Supeno I Nomor 2 Semarang 50234</p>
                <p class="mb-0">Telepone 024-8319140 Faksimile (024)8319328</p>
                <p class="mb-0">Laman: <a href="http://diskominfo.jatengprov.go.id">http://diskominfo.jatengprov.go.id</a></p>
                <p class="mb-0">Surat Elektronik: <a href="mailto:diskominfo@jatengprov.go.id">diskominfo@jatengprov.go.id</a></p>
            </div>
        </div>
    </div>
    <div class="divider"></div>
    <div class="mb-4">
        <h1>Laporan Fasilitasi oleh ISP {{ $providers->name }}</h1>
        <p>Date: {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('l, d F Y') }}</p>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Event Name</th>
                    <th>Provider</th>
                    <th>Instansi</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $providers->name }}</td>
                    <td>{{ $instansi->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->start)->locale('id')->translatedFormat('l, d F Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>