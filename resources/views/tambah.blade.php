<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Hitungan Anak SD - Tambah</h1>
    <form action="{{ route('action-tambah') }}" method="post">
        @csrf
        <label for="">Angka 1</label>
        <br>
        <input type="number" name="angka1">
        <br>
        <label for="">Angka 2</label>
        <br>
        <input type="number" name="angka2">
        <br>
        <button type="submit">Hitung</button>
    </form>
    <a href="{{  url()->previous() }}">Kembali</a>
    <h3>Hasilnya: {{ isset($hasilTambah) ? $hasilTambah : 0 }}</h3>
</body>

</html>