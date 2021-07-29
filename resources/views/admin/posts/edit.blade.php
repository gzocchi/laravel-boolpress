@extends('layouts.app')

@section('content')
<section class="py-4">
    
    <h1 class="mb-1">Modifica - <span class="text-info">{{ $post->title }}</span></h1>
    <a href="{{ route("admin.posts.show", $post->id) }}" class="btn btn-sm btn-outline-success text-uppercase">Show</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p class="my-1">{{ $error }}</p>
            @endforeach            
        </div>
    @endif
    
    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-row my-4">
            <div class="form-group col-md-4">
                <label for="title">Titolo</label>
                <input type="text"
                class="form-control @error('title') is-invalid @enderror"
                id="title"
                placeholder="Inserisci il titolo"
                name="title"
                value="{{ old('title', $post->title) }}"
                required>
            </div>
            <div class="form-group col-md-4 offset-md-4">
                <label for="category_id">Categoria</label>
                <select class="form-control
                @error('category_id') is-invalid @enderror"
                name="category_id"
                id="category_id">
                    <option value="">-- Seleziona una categoria --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ ($category->id == old('category_id', $post->category_id)) ? 'selected' : '' }}
                            >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-row my-4">

            <div class="form-group col">
                <label for="content">Articolo</label>
                <textarea
                class="form-control @error('content') is-invalid @enderror"
                id="content"
                name="content"
                placeholder="Inserisci il testo"
                rows="15"
                required>{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="form-group col-12 my-3 text-center">

                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        @if ($errors->any())
                            <input class="form-check-input"
                            type="checkbox"
                            id="tag-{{ $tag->id }}"
                            value="{{ $tag->id }}"
                            name="tags[]"
                            {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                            >
                        @else
                            <input class="form-check-input"
                            type="checkbox"
                            id="tag-{{ $tag->id }}"
                            value="{{ $tag->id }}"
                            name="tags[]"
                            {{ $post->tags->contains($tag->id) ? 'checked' : '' }}
                            > 
                        @endif
                        <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                    </div>     
                @endforeach

            </div>    

        </div>

        <div class="text-center mt-4">
            <a href="{{ route("admin.posts.index") }}" class="btn btn-sm btn-info text-uppercase">Index</a>
            <button type="submit" class="btn btn-sm btn-success text-uppercase">Save</button>
        </div>
        
      </form>
    </form>
    
</section>
@endsection