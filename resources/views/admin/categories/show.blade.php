@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">{{ $category->name }}</h1>

        @if (count($category->posts) > 0)
            <h4 >Elenco articoli:</h4>   
            <ul class="mt-4">
                @foreach ($category->posts as $post)
                    <li>
                        <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
                    </li>
                @endforeach
            </ul>
        @else
            <h2 class="text-center">Nessun articolo all'interno di questa categoria.</h2>   
        @endif

    </div>
@endsection