@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">{{ $category->name }}</h1>

        @if (count($category->posts) > 0)

            <table class="my-3 table table-striped table-bordered table-responsive-md">
                <thead class="table-dark text-uppercase">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Slug</th>
                    <th colspan="3" class="text-center">Azioni</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($category->posts as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->slug }}</td>
                            <td class="text-uppercase text-center align-middle">
                                <a href="{{ route("admin.posts.show", $item->id) }}" class="btn btn-sm btn-outline-success">Show</a>
                            </td>
                            <td class="text-uppercase text-center align-middle">
                                <a href="{{ route("admin.posts.edit", $item->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                            </td>
                            <td class="text-uppercase text-center align-middle">
                                <form 
                                    action="{{ route('admin.posts.destroy', $item->id) }}" method="POST"
                                    onSubmit = "return confirm(`Cancellare l'articolo '{{ addslashes($item->title) }}'?`)">
                                    @csrf
                                    @method('DELETE')
        
                                    <button type="submit" class="btn btn-sm btn-danger text-uppercase">Delete</button>
        
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h2 class="text-center">Nessun articolo all'interno di questa categoria.</h2>   
        @endif
    </div>
@endsection