@extends('layouts.app-master')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8 mt-2">
            <div>
                <a class="btn btn-secondary" href="{{ route('users.show', $user->id) }}">Back to User</a>
            </div>
            <h2 class="h-1">Edit user</h2>
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
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-2">
                    <input value="{{ $user->name }}" type="text" name="name"class="form-control"
                        placeholder="Enter your name">
                </div>
                <div class="mb-2">
                    <input value="{{ $user->email }}" type="email" name="email"class="form-control"
                        placeholder="Enter your email">
                </div>
                <div class="mb-2">
                    <input value="{{ $user->username }}" type="text" name="username"class="form-control"
                        placeholder="Enter your username">
                </div>

                {{-- <div class="row mb-2">
                    <div class="col-md-12">
                        <input type="file" name="image" class="form-control">
                    </div>
                </div> --}}

                <button class="btn btn-primary">Save</button>

            </form>
        </div>
    </div>
@endsection
