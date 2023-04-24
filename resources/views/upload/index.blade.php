@extends('layouts.app-master')

@section('content')
    <div class="row">
        <h2 style="margin-top: 30px;">Upload Image</h2>
        <div class="panel-body">
            <div class="col-md-8">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    <img src="{{ asset('images') }}/{{ Session::get('image') }}" width="300" height="300">
                @endif

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
                <form action="{{ route('upload.image.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row"> <br>
                        <div class="col-md-6">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
