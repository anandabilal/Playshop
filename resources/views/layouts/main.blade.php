{{-- NIM         : 2301883725 --}}
{{-- Nama        : Ananda Bilal --}}
{{-- Jurusan     : Teknik Informatika --}}
{{-- Semester    : 5 (Odd 2021/2022) --}}
{{-- Kelas       : COMP6681001 - Web Programming BU01 --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/style.css">
    <title>{{ $title }} - Playshop</title>
</head>
<body>
    @include('partials.navbar')
    @yield('container')
    @include('partials.footer')
</body>
</html>
