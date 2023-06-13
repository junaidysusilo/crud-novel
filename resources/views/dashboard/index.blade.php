@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Selamat datang, {{ auth()->user()->name }}</h1>
</div>
<div class="card-body">
    <div class="row d-flex gap-3">
        <div class="col-2 card bg-primary text-white">
            <h3>Jumlah Novel</h3>
            <h1>{{ $jumlahProduk }}</h1>
        </div>
        <div class="col-2 card bg-success text-white">
            <h3>Jumlah Like</h3>
            <h1>{{ $jumlahLike }}</h1>
        </div>
        <div class="col-2 card bg-success text-white">
            <h3>Jumlah Dislike</h3>
            <h1>{{ $jumlahDislike }}</h1>
        </div>
    </div>
    </div>

@endsection