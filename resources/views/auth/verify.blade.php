@extends('layouts.app')

@section('content')

<div class="pl-4 py-0 pt-4 overlow-hidden">
    <a type="submit" class="btn" href="{{route('login')}}">
        <i class="fas fa-arrow-left pr-2"></i>Volver
    </a>

    <div class="row m-0 mt-5 justify-content-center  ">
        <div class="col-md-8">
            <div class="card p-4 ">
                
                <div class="title-c">   <a class="  navbar-brand text-brand" href="{{route('inicio')}}">Denta<span class="color-b">Sys</span></a></div>
                <p class="mt-3 text-center">{{ __('Verifique su dirección de correo electrónico') }}</p>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Se ha enviado un nuevo enlace de verificación a su dirección de correo electrónico.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, consulte su correo electrónico para ver si hay un enlace de verificación.') }}
                    {{ __('Si no recibió el correo electrónico') }}.
                    <form class="mt-5" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Haga clic aquí para solicitar otro') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection


