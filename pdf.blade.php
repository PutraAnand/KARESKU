<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Resep</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f9;
        }
    </style>
</head>
<body>
    <h1>Daftar Resep</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Bahan</th>
                <th>Langkah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reseps as $resep)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $resep->nama }}</td>
                <td>{{ $resep->deskripsi }}</td>
                <td>{{ $resep->bahan }}</td>
                <td>{{ $resep->langkah }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
