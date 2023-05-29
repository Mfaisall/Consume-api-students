<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data</title>
</head>

<body>
    <h2>Tambah Data Baru</h2>
      @if (Session::get('errors'))
        <div style="width: 100%; background: green; padding: 10px;">
            {{ Session::get('errors') }}
        </div>
    @endif
    <form action="{{route('send')}}" method="POST">
        @csrf
        <div style="display: flex; margin-bottom: 15px;">
            <label for="nis">Nis</label>
            <input type="text" name="nis" id="nis" placeholder="NIS">
        </div>
        <div style="display: flex; margin-bottom: 15px;">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" placeholder="NAMA">
        </div>
        <div style="display: flex; margin-bottom: 15px;">
            <label for="rombel">Rombel</label>
            <select name="rombel" id="rombel">
                <option hidden disabled selected>Masukan Rombel</option>
                <option value="PPLG X">PPLG X</option>
                <option value="PPLG XI">PPLG XI</option>
                <option value="PPLG XII">PPLG XII</option>
            </select>
        </div>
        <div style="display: flex; margin-bottom: 15px;">
            <label for="rayon">Rayon</label>
            <input type="text" name="rayon" id="rayon" placeholder="RAYON">
        </div>
        <button type="submit">Kirim</button>
    </form>
</body>

</html>
