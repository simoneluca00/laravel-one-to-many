@extends('layouts.app')

@section('content')
    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif

    <div class="container">
        <div class="text-center">
            <a class="btn btn-success mb-4" href="{{route('admin.posts.create')}}">Crea un nuovo post</a>
        </div>

        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Slug</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>

                @forelse ($posts as $post)
                    <tr>
                        <th scope="row" class="align-middle">
                            <img src="{{$post->image}}" alt="img di {{$post->title}}" width="50px">
                        </th>
                        <td class="align-middle">
                            {{$post->title}}
                        </td>
                        <td class="align-middle">
                            <p>{{$post->content}}</p>
                        </td>
                        <td class="align-middle">{{$post->slug}}</td>

                        <td class="align-middle">
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary">View</a>
                                <a href="{{route('admin.posts.edit', $post->id)}}" class="btn btn-warning mx-1">Edit</a>
                                <form action="{{route('admin.posts.destroy', $post->id)}}" method="post" data-name="{{$post->title}}" class="deleteForm m-0">
                                    
                                    @method('DELETE')
                                    @csrf
    
                                    <button type="submit" class="btn btn-danger">Delete</button>
    
                                </form>
                            </div>
                        </td>
                    </tr>

                @empty
                    <p>Non sono presenti post...</p>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    {{-- js confirm quando si vuole eliminare un record --}}
    <script src="{{asset('js/deleteConfirm.js')}}"></script>
@endsection
