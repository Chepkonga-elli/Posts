@extends('layouts.app-master')


@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col" width="15%">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col" width="20%">Username</th>
                    <th scope="col" width="10%">Edit</th>
                    <th scope="col" width="10%">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row ">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->username }}</td>


                        <td>
                            <form action="{{ route('users.edit', $user->id) }}" method="POST">
                                @csrf
                                {{-- @method('get') --}}
                                {{-- @method('delete')? --}}
                                <button class="btn btn-primary btn-sm">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('users.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>



                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $users->links() !!}
        </div>
    @endsection
