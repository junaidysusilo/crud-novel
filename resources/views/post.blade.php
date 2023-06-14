@extends('layouts.main')

@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $post->title }}</h1>

            <p>Oleh: {{ $post->author->name }}</a> di {{ $post->category->name }}</p>
            
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid" alt="{{ $post->category->name }}">

            <article class="my-3 fs-5">
                {!! $post->description !!}
            </article>
            
            <a href="/posts" class="d-block mt-3">Back to home</a>
        </div>
    </div>
</div>
@endsection