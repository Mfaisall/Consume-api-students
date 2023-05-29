<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>



<body>
    <marquee><h2>Data Trash Student Api</h2></marquee> ||
    <a href="/" class="btn btn-primary btn-sm">BACK</a>
    @if (Session::get('success'))
        <div style="width: 100%; background: green; padding: 10px;">
            {{ Session::get('success') }}
        </div>
    @endif
    @foreach ($trash as $show)
        <ol>
            <li>Nis: {{ $show['nis'] }}</li>
            <li>Nama: {{ $show['nama'] }}</li>
            <li>Rombel: {{ $show['rombel'] }}</li>
            <li>Rayon: {{ $show['rayon'] }}</li>
            <li>Data Di Hapus: {{ \Carbon\Carbon::parse($show['deleted_at'])->format('j F, Y') }}</li>
            <li>Aksi :<a href="{{ route('restore', $show['id']) }}" class="btn btn-primary btn-sm">Restore</a> || 
                      <a href="{{ route('permanent', $show['id']) }}" class="btn btn-primary btn-sm">Del Permanent</a>
            </li>
        </ol>
    @endforeach
</body>
</html>
