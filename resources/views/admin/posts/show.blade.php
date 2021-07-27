@extends('layouts.app')

@section('content')
<section class="py-4">

    @if (session('message'))
        <div class="alert alert-info mb-4">
            {{ session('message') }}
        </div>
    @endif

    <small>{{ $post->slug }}</small>
    <h1 class="mb-4 text-info">{{ $post->title }}</h1>

    <div class="category my-3">
       <span>Categoria: </span>
        @if ($post->category)        
            <a href="{{ route('admin.categories.show', $post->category->id) }}" class="badge badge-info">{{ $post->category->name }}</a>
        @else
            <span class="badge badge-secondary">N/D</span>     
        @endif 
    </div>
 
    <p class="text-justify">{{ $post->content }}</p>

    <div class="text-center">
        <a href="{{ route("admin.posts.index") }}" class="btn btn-sm btn-info text-uppercase">Index</a>
        <a href="{{ route("admin.posts.edit", $post->id) }}" class="btn btn-sm btn-outline-info text-uppercase">Edit</a>
    </div>

</section>
@endsection