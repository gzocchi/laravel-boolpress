@extends('layouts.app')

@section('content')
<section class="py-4">

    @if (session('message'))
        <div class="alert alert-info mb-4">
            {{ session('message') }}
        </div>
    @endif
    
    <div class="title mb-4">
        <small>{{ $post->slug }}</small>
        <h1 class="text-info">{{ $post->title }}</h1>
    </div>    

    <div class="category my-3">
       <span>Categoria: </span>
        @if ($post->category)        
            <a href="{{ route('admin.categories.show', $post->category->id) }}" class="badge badge-info">{{ $post->category->name }}</a>
        @else
            <span class="badge badge-secondary">N/D</span>     
        @endif 
    </div>
 
    <div class="text-justify">
        <p>{{ $post->content }}</p>
    </div>

    @if (count($post->tags) > 0)
        <div class="my-2">
            @foreach ($post->tags as $tag)
                <span class="badge badge-pill {{ $loop->even ? 'badge-dark' : 'badge-secondary' }}">{{ $tag->name }}</span>    
            @endforeach
        </div>
    @endif
    
    <div class="text-center mt-4">
        <a href="{{ route("admin.posts.index") }}" class="btn btn-sm btn-info text-uppercase">Index</a>
        <a href="{{ route("admin.posts.edit", $post->id) }}" class="btn btn-sm btn-outline-info text-uppercase">Edit</a>
    </div>

</section>
@endsection