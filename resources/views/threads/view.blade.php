@extends('layouts.default')
@section('content')
    <div>
        <h3>{{ $thread->title }}</h3>

        <div class="card grey lighten-4">
            <div class="card-content">
                {{ $thread->body }}
            </div>

            <div class="card-action">
                <a href="{{ route('threads.edit', $thread->id) }}">Editar</a>
            </div>
        </div>

        <replies>
            @include('layouts.default.preloader')
        </replies>
    </div>
@endsection
