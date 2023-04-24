@extends('layouts.app-master')


@section('content')
    <div class="container">
        <div class="d-flex col-12 mt-3 justify-content-between">
            <a href="{{ route('users.display') }}" class="btn btn-secondary">All users</a>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col" width="30%">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col" width="30%">Username</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <th scope="row ">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->username }}</td>
                    {{-- <td><a class="btn btn-secondary" href="{{ route('users.edit', $user->id) }}">Details</a></td> --}}
                </tr>

            </tbody>
        </table>
    </div>
@endsection
