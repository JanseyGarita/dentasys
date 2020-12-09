@extends('layouts.app')

@section('content')
 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card login">
            <div class="title-c">   <a class="  navbar-brand text-brand" href="{{route('inicio')}}">Denta<span class="color-b">Sys</span></a></div>
           
                <div class="card-body">
                    <form method="POST"  action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <div class="col-md-6 col-center">
                            <label for="#email">Email:</label>
                           
                                <input id="email"  type="email" class=" price-a form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Email" required  autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                             
                        </div>
                        </div>
                        <div class="form-group row">
                           
                            <div class="col-md-6 col-center">
                            <label for="#password">Contraseña:</label>
                              
                                <input id="password" type="password" class=" price-a form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                           

                            <div class="col-md-6 col-center">
                                
                            <label for="#password">Confirmar contraseña:</label>
                                <input id="password-confirm" type="password" class="price-a form-control" name="password_confirmation" placeholder="Confirmar contraseña"  required autocomplete="new-password">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-light">
                                    {{ __('Restablecer Contraseña') }}
                                </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
