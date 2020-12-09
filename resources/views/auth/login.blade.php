@extends('layouts.app')

@section('content')
<div class="pl-4 py-0 pt-4">
    <a type="submit" class="btn" href="{{route('inicio')}}">
        <i class="fas fa-arrow-left pr-2"></i>Volver
    </a>
</div>
<div class="container mt-n5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card login">
                <div class="title-c"> <a class="  navbar-brand text-brand" href="{{route('inicio')}}">Denta<span
                            class="color-b">Sys</span></a></div>
                <div class="card-body ">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row justify-content-center">
                            <div class="col-md-8 col-center">
                                <label for="#email">Correo/Usuario:</label>
                                <input id="email" type="email" placeholder="Correo/Usuario"
                                    class="price-a form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 col-center">
                                <label for="#password">Contraseña:</label>
                                <input id="password" type="password" placeholder="Contraseña"
                                    class="price-a form-control @error('password') is-invalid @enderror" name="password"
                                    
                                    required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-light col-sm-6 ">
                            Iniciar Sesión
                        </button>
                        <a type="submit" class="col-sm-6" href="{{ route('password.request') }}">
                            Recuperar Contraseña
                        </a>
                        <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <a for="">Recordar</a>
                                  
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                               
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Olvidó la Contraseña?
                                    </a>
                                @endif
                            </div>
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection