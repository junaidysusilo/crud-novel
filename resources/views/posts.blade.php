@extends('layouts.main')

@section('container')

    <h1 class="mb-3 text-center">{{ $title }}</h1>

    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-6">
                <form action="/posts" method="get">
                    @if (request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    @if (request('author'))
                        <input type="hidden" name="author" value="{{ request('author') }}">
                    @endif
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($posts->count())
    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-3 mb-4">
                    <div class="card" style="height: 420px">
                        <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.7)"><a href="/posts?category={{ $post->category->slug }}" class="text-white text-decoration-none">{{ $post->category->name }}</a></div>
                        <img src="https://source.unsplash.com/400x300?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}">
                        <div class="card-body">
                        <h5 class="card-title text-truncate" style="width: 250px"><a href="/post/{{ $post->slug }}" class="text-decoration-none text-dark text-truncate" >{{ $post->title }}</a></h5>
                        <p>
                            
                            <small class="text-muted">
                                {{ 'Rp ' . number_format(intval($post->harga),2,',','.') }}
                            </small>
                        </p>
                        <div style="height: 50px; overflow: hidden">
                            <p class="card-text" >{{ $post->description }}</p>
                        </div>
                        
                        <div style="align-items: center; display:flex" class="mt-2 gap-2">
                            @php
                            $totalUlasan=$post->ulasan->count();
                            $totalSuka=$post->ulasan->filter(function($e){
                                if($e->rate=="like"){
                                    return $e;
                                }
                            })->count();
                            $totalNoSuka=$post->ulasan->filter(function($e){
                                if($e->rate=="dislike"){
                                    return $e;
                                }
                            })->count();
                            
                            @endphp
                            <a href="{{ route('ulasan', $post->id) }}?status=like" class="btn btn-primary"><i class="bi bi-hand-thumbs-up"></i>{{ $totalSuka }}</a>
                            <a href="{{ route('ulasan', $post->id) }}?status=dislike" class="btn btn-danger"><i class="bi bi-hand-thumbs-down"></i>{{ $totalNoSuka }}</a>
                            <div style="font-weight: bold">
                                @if ($totalUlasan!=0)
                                {{ number_format((($totalSuka*5+$totalNoSuka*0)/$totalUlasan) ,1)}}
                                    @else
                                    0.0
                                @endif
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @else
        <p class="text-center fs-4">No post found.</p>
    @endif

    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>

@endsection