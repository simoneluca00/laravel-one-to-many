@extends('layouts.app')

@section('content')

   @include('admin.includes.validation.errors')

    <div class="container">

        <form action="{{route('admin.posts.store')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="title">Inserisci il titolo del post:</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Titolo" value="{{old('title')}}" maxlength="255" required>
            </div>
            <div class="form-group">
                <label for="content">Inserisci la descrizione del post:</label>
                <textarea class="form-control" id="content" name="content" rows="3" placeholder="Descrizione" required>{{old('content')}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Inserisci l'URL dell'immagine:</label>
                <input type="text" name="image" class="form-control" id="image" placeholder="https://example.com" value="{{old('image')}}" pattern="https://.*" maxlength="255" required>
            </div>

            <button type="submit" class="btn btn-primary">Crea Post</button>
        </form>

    </div>

@endsection