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

    <form action="{{ route('admin.posts.store') }}" method="POST">
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
                required>{{ old('content') }}</textarea>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-sm btn-success text-uppercase">Save</button>
        </div>
        
    </form>
    
</section>
@endsection