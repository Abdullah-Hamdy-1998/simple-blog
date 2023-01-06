@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Post</div>
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group mt-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $post->title }}" required>
                            </div>

                            <div class="form-group mt-3">
                                <label for="body">Body</label>
                                <textarea class="form-control" id="body" name="body" rows="3" required>{{ $post->body }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Update Post</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
