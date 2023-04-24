@extends('layouts.app-master')

@section('content')
    <div class="row bg-warning justify-content-center">
        <div class="col-10 bg-light py-2">
            <div class="d-flex justify-content-between">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">All posts</a>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
            </div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->body }}</p>
            <div class="col-12">

                <div class="row justify-content-center">
                    <div class="col-7">
                        <img class="img-responsive img img-fluid rounded w-100" src="{{ asset($post->image_uri) }}"
                            alt="">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
