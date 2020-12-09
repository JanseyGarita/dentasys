@extends('layouts.app')
@section('links')
<link href="{{asset('assets/css/style.css')}}" rel="stylesheet">  
@endsection

@section('content')
<div class="pl-4 py-0 pt-4">
    <a type="submit" class="btn" href="{{route('inicio')}}">
        <i class="fas fa-arrow-left pr-2"></i>Volver
    </a>
</div>
<div class="container mt-n5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-capitalize card mt-4 login py-3">
                <div class="title-c">
                    <a class="navbar-brand text-brand" href="{{route('inicio')}}">
                        Denta<span class="color-b">Sys</span>
                    </a>
                </div>
                <div class="card-body">
                    <form method="POST"  action="{{ route('make.register') }}" >
                        @csrf

                        <div class="form-group row d-flex justify-content-center">
                            <label for="name" class="col-md-12 col-form-label col-center d-flex flex-column">
                                {{ __('Nombre del administrador') }}
                            </label>
                            <br>
                            <div class="col-md-6 d-flex justify-content-center">
                                <input  id="name" type="text" placeholder="Nombre"
                                    class=" price-a form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                          
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center">
                            <label for="email" class="col-md-12 col-form-label">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" placeholder="Email"
                                    class="price-a form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center">
                            <label for="password" class="col-md-12 col-form-label">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" placeholder="Contraseña"
                                    class="price-a form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center">
                            <label for="password-confirm"
                                class="col-md-12 col-form-label">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input placeholder="Confirmar la contraseña" id="password-confirm" type="password" class="price-a form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row d-flex justify-content-center">
                            <label for="password-confirm"
                                class="col-md-12 col-form-label">{{ __('Selecciona un Plan') }}</label>

                            <div class="col-md-6">
                                <select name="plan" class="price-a form-control p-0 pl-2" id="">
                                    <option value="1">Platino</option>
                                    <option value="2">Premiun</option>
                                    <option value="3">Ultra</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0 pt-3 d-flex justify-content-center">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success rounded-pill px-5">
                                    {{ __('Registrarse') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection