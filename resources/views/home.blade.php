@extends("layouts.main")

@section("container")
    <h1>Selamat datang, anggi</h1>
    <h3>Total uang anda, Rp. {{ number_format($remains, 2) }}</h1>
@endsection