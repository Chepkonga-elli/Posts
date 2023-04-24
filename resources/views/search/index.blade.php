@extends('layouts.app-master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <div>Showing search results of: <span class="fw-bold">{{ request()->q }}</span></div>
            <div>{{ $results->count() }} results in {{ $duration }} seconds</div>
            @foreach ($results as $result)
                <div class="row">
                    <div class="col-12">
                        <a href="{{ url('posts/' . $result->id) }}">
                            {{ $result->title }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
