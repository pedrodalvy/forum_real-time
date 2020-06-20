@extends('layouts.default')
@section('content')
    <div>
        <h3>Tópicos mais recentes</h3>
        <threads>
            @include('layouts.default.preloader')
        </threads>
    </div>
@endsection
