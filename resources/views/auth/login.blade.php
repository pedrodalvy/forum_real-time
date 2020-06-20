@extends('layouts.app')

@section('content')
    <div class="row" style="margin: 20px !important;">
        <div class="col s6 offset-s3 z-depth-1" id="panell" style="padding: 20px">
            <h5 id="title">Login</h5>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="input-field" id="email">
                    <input name="email" type="email" class="validate" value="{{ old('email') }}">
                    <label for="email">E-mail</label>
                </div>

                <div class="input-field" id="password">
                    <input name="password" type="password" class="validate">
                    <label for="password">Senha</label>
                </div>

                <p>
                    <label>
                        <input type="checkbox" name="remember"
                            {{ old('remember') ? 'checked' : '' }}/>
                        <span>Permanecer conectado</span>
                    </label>
                </p>

                <button class="waves-effect waves-light btn"
                        type="submit">Login
                </button>

            </form>

        </div>
    </div>
@endsection



