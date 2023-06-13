@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Kategori Novel : {{ $category }}</h1>

    @foreach ($posts as $post)
    <article>
        <h2>
            <a href="/post/{{ $post->slug }}">{{ $post->title }}</a>
        </h2>
        <p>{{  $post->description  }}</p>    
    </article>
    @endforeach
@endsection