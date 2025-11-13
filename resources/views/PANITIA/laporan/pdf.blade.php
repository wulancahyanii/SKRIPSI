<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Penilaian</title>
    <style>
        body { font-family: DejaVu Sans; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2 align="center">Laporan Hasil Penilaian</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peserta</th>
                <th>Total Nilai</th>
                <th>Rata-rata</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rekap as $i => $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data['peserta'] }}</td>
                    <td>{{ $data['total_nilai'] }}</td>
                    <td>{{ $data['rata_rata'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
