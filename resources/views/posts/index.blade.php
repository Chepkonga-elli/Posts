@extends('layouts.app-master')

@section('content')
    <div class="row">
        <div class="d-flex justify-content-between">
            <h1 class="page-title">Post</h1>
            <a href="{{ route('posts.create') }}" class=" btn btn-sm btn-info justify-content-center mt-2 mb-2 ">Create</a>
        </div>
        <table class="table table-striped table-hover table-light">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Title
                    </th>
                    <th>
                        Body
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>
                            #{{ $post->id }}
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div style="width: 45px;height:45px"
                                    class="bg-light border me-2 rounded-circle d-flex align-items-center">
                                    @if ($post->image_uri)
                                        <img class="img-responsive img img-fluid rounded w-100 h-100 rounded-circle"
                                            src="{{ asset($post->image_uri) }}" alt="">
                                    @endif
                                </div>
                                <span>{{ $post->title }}</span>
                            </div>
                        </td>
                        <td>
                            {{ $post->body }}
                        </td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}"><button btn
                                    class=" btn btn-primary btn-sm">Show</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
