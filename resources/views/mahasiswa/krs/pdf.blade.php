<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>KARTU RENCANA STUDI (KRS)</h2>
    <p>NPM: {{ $detailMahasiswa->npm }} <br> Nama: {{ $detailMahasiswa->nama }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataKrs as $k)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $k->kode_matakuliah }}</td>
                <td>{{ $k->matakuliah->nama_matakuliah }}</td>
                <td>{{ $k->matakuliah->sks }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" style="text-align: right;"><b>Total SKS</b></td>
                <td><b>{{ $totalSks }}</b></td>
            </tr>
        </tfoot>
    </table>
</body>
</html>