@extends('layouts.app')
@section('content')
    <div class="form-account">
        <div class="form-div">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <img src="{{ asset("img/lignumvitae.png") }}" alt="Logo do App">
                <input placeholder="Login" id="email" type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span role="alert">{{ $message }}</span>
                @enderror

                <input placeholder="Senha" id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span role="alert">{{ $message }}</span>
                @enderror

                <button type="submit">Entrar</button>
            </form>
        </div>
        <div class="form-background" style="background-image: url({{ asset("img/background.png") }})"></div>
    </div>
@endsection
