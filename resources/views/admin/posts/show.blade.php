@extends('layouts.app')

@section('content')

@include('admin.includes.messages.success')

    <div class="container mt-4 d-flex align-items-center">
        <div class="mr-5">
            <img src="{{$post->image}}" alt="{{$post->title}}" width="250">
    
            <h2>
                {{$post->title}}
            </h2>
    
            <p>
                {{$post->content}}
            </p>
        </div>

        <div class="d-flex justify-content-center">
            <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-warning mr-1 h-100">Edit</a>
            <form action="{{route('admin.posts.destroy', $post->id)}}" method="post" data-name="{{$post->title}}" class="deleteForm m-0">
                
                @method('DELETE')
                @csrf

                <button type="submit" class="btn btn-danger">Delete</button>

            </form>
        </div>
    </div>

@endsection

@section('scripts')
    {{-- js confirm quando si vuole eliminare un record --}}
    <script src="{{asset('js/deleteConfirm.js')}}"></script>
@endsection