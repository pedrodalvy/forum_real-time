@extends('layouts.default')
@section('content')
    <div>
        <h3>{{ $thread->title }}</h3>

        <div class="card grey lighten-4">
            <div class="card-content">
                {{ $thread->body }}
            </div>
        </div>
    </div>
@endsection
