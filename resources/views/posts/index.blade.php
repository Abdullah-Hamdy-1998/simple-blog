@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Posts</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        {{-- @if (count($posts) > 0) --}}
                            @foreach ($posts as $post)
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->title }}</h5>
                                        <p class="card-text">{{ $post->body }}</p>
                                        <p class="card-text text-muted">Created by {{ $post->user->name }}</p>
                                        @can('update', $post)
                                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Edit</a>
                                        @endcan
                                        @can('delete', $post)
                                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                            @endforeach
                        {{-- @else
                            <p>There are no posts to show.</p>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
