@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Novel</h1>
</div>

@if(session()->has('success'))
            <div class="alert alert-success col-lg-10" role="alert">
                {{ session('success') }}
            </div>
@endif

<div class="table-responsive col-lg-10">
    <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Tambah novel baru</a>
    <table class="table table-striped table-sm">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Judul</th>
            <th scope="col">Kategori</th>
            <th scope="col">Harga</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $i=>$post)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ 'Rp' . number_format(intval($post->harga),2,',','.') }}</td>
                <td class="d-flex gap-2">
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning">Ubah</a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger" onclick="return confirm('Apakah kamu yakin?')" border-0>Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection