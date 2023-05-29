<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Consume REST API Students</title>
</head>

<body>
    <marquee><h2>LIST SEMUA DATA STUDENTS</h2></marquee>
    <form action="" method="get">
        @csrf
        <input type="text" name="search" placeholder="Cari Nama .....">
        <button type="submit">Cari</button>
        <a href="/" style="text-decoration: none; color:black;" class="btn btn-primary btn-sm">Refresh</a>
        <a href="{{ route('add') }}" style="text-decoration: none; color:black;" class="btn btn-primary btn-sm">Tambah Data Baru</a>
        <a href="/trashall" class="btn btn-primary btn-sm" style="color: black">trash</a>
    </form>
    @if (Session::get('success'))
        <div style="width: 100%; background: green; padding: 10px;">
            {{ Session::get('success') }}
        </div>
    @endif
    @foreach ($students as $student)
        <ol>
            <li>Nis: {{ $student['nis'] }}</li>
            <li>Nama: {{ $student['nama'] }}</li>
            <li>Rombel: {{ $student['rombel'] }}</li>
            <li>Rayon: {{ $student['rayon'] }}</li>
            <li>Aksi : <a class="btn btn-primary btn-sm" href="{{ route('edit', $student['id']) }}">Edit</a>||
                <form action="{{ route('delete', $student['id']) }}" method="POST"">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary btn-sm" style="position: relative; margin-left:90px; bottom:30px;">DEL</button>
                </form>
            </li>
        </ol>
    @endforeach
</body>
</html>
