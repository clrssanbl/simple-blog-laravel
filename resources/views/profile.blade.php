@extends('layouts.main')

@section('content')
    <h1>Halaman About</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{ $image }}" alt="{{ $name }}" width=150 class="img-thumbnail rounded-circle">
@endsection