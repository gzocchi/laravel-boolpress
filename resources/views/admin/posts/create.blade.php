@extends('layouts.app')

@section('content')
<section class="py-4">

    <h1 class="text-center text-info mb-4">Nuovo Articolo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p class="my-1">{{ $error }}</p>
            @endforeach 
        </div> 
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="title">Titolo</label>
                <input type="text"
                class="form-control @error('title') is-invalid @enderror"
                id="title"
                placeholder="Inserisci il titolo"
                name="title"
                value="{{ old('title') }}"
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
                            {{ ($category->id == old('category_id')) ? 'selected' : '' }}
                            >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="form-row my-4">

            <div class="form-group col-12">
                <label for="content">Articolo</label>
                <textarea
                class="form-control @error('content') is-invalid @enderror"
                id="content"
                name="content"
                placeholder="Inserisci il testo"
                rows="15"
                required>{{ old('content') }}</textarea>
            </div>

            <div class="form-group col-md-8 my-3">

                @foreach ($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"
                        type="checkbox"
                        id="tag-{{ $tag->id }}"
                        value="{{ $tag->id }}"
                        name="tags[]"
                        {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                        >
                        <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
                    </div>     
                @endforeach

            </div>

            <div class="form-group col-md-4 my-3">
                <label for="cover" class="custom-file-label">Carica immagine</label>
                <input type="file" name="cover" class="custom-file-input @error('cover') is-invalid @enderror" id="cover">
            </div>

        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-sm btn-success text-uppercase">Save</button>
        </div>

    </form>
    
</section>
@endsection