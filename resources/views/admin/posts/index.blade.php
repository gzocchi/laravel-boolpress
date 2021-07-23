@extends('layouts.app')

@section('content')
<div class="container">

    <h1 class="text-center my-4">Elenco Post</h1>

    @if ($posts->count() === 0)
        <h3>Non è presente nessun post</h3>
    @else
        <h3>Sono presenti {{$posts->count()}} post</h3> 
    @endif

</div>
@endsection