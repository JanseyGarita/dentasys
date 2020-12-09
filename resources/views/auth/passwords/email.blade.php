@extends('layouts.app')
 
@section('content')
<div class="pl-4 py-0 pt-4">
    <a type="submit" class="btn" href="{{route('login')}}">
        <i class="fas fa-arrow-left pr-2"></i>Volver
    </a>
    <div class="row m-0 justify-content-center">
        <div class="col-md-8">
            <div class="card login"> 
            <div class="title-c">   <a class="  navbar-brand text-brand" href="{{route('inicio')}}">Denta<span class="color-b">Sys</span></a></div>
           
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row"> 
                            <div class="col-md-6  col-center "> 
                                
                            <label for="#email">Email:</label>
                                <input id="email" type="email" class="price-a form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
 
                            <button type="submit" class="btn btn-light col-sm-6 ">
                            {{ __('Enviar link de recuperación') }}
                                </button> 
                                 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
    