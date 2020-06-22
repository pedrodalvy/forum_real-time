@extends('layouts.default')
@section('content')
    <div>
        <h3>Editar Tópico</h3>

        <div class="card grey lighten-4">
            <div class="card-content">
                <form method="post" action="{{ route('threads.update', $thread->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="input-field">
                        <input type="text" placeholder="Título" value="{{ $thread->title }}" name="title">
                    </div>
                    <div class="input-field">
                        <textarea class="materialize-textarea" placeholder="Conteúdo" name="body">{{ $thread->body }}</textarea>
                    </div>
                    <button type="submit" class="btn red accent-2">Enviar</button>
                </form>
            </div>

            <div class="card-action">
                <a href="{{ route('threads.show', $thread->id) }}">Voltar</a>
            </div>
        </div>

    </div>
@endsection
