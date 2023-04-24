@extends('layouts.app-master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8 mt-2">
            <div>
                <a class="btn btn-secondary" href="{{ route('posts.show', $post->id) }}">Back to post</a>
            </div>
            <h2 class="h-1">Post</h2>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <input value="{{ $post->title }}" type="text" name="title"class="form-control"
                        placeholder="Enter the post title">
                </div>
                <div class="mb-2">
                    <textarea name="body" class="form-control" placeholder="Enter your post content...">
                        {{ $post->body }}
                    </textarea>
                </div>
                <div class="row mb-2">
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                </div>

                <button class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>
@endsection
