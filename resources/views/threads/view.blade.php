@extends('layouts.default')
@section('content')
    <div>
        <h3>{{ $thread->title }}</h3>

        <div class="card grey lighten-4">
            <div class="card-content">
                {{ $thread->body }}
            </div>

            <div class="card-action">
                @if (\Auth::user() and \Auth::user()->can('update', $thread))
                    <a href="{{ route('threads.edit', $thread->id) }}">Editar</a>
                @endif
                <a href="{{ route('index') }}">Voltar</a>
            </div>
        </div>

        <replies thread-id="{{ $thread->id }}">
            @include('layouts.default.preloader')
        </replies>
    </div>
@endsection
