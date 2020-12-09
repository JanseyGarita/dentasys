@extends('dashboard')
@section('content')
<div class="container">
    <form action="{{route('update.profile')}}">
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-6 p-5">
                <div class="thumbnail-container">
                    <img src="https://ui-avatars.com/api/?name={{Auth::user()->nombre}}" class="rounded mx-auto d-block"
                        alt="{{Auth::user()->nombre}}">
                </div>
                <div class="form-group py-4">
                    <div class="custom-file d-flex justify-content-center">
                        <p class="text-justify font-weight-bold" style="font-size: 1.5em">{{Auth::user()->nombre}}</p>
                    </div>
                </div>
                <div class="form-group pl-5">
                    <label for="lblemail">Correo electrónico: </label>
                    <p class="text-justify" id="lblemail" style="font-size: 1.5em">{{Auth::user()->email}}</p>

                </div>
                <div class="form-group pl-5">
                    <label for="lbltelefono">Teléfono: </label>
                    <p class="text-justify" id="lbltelefono" style="font-size: 1.5em">
                        {{(Auth::user()->telefono)? Auth::user()->telefono:"0000-0000"}}</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group pt-5">
                    <div class="custom-file d-flex justify-content-center">
                        <p class="text-justify font-weight-bold" style="font-size: 1.5em">Editar Datos</p>
                    </div>
                </div>
                <div class="form-group pt-4 px-5">
                    <label for="nombre">Nombre de usuario</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        placeholder="{{Auth::user()->nombre}}" required>
                </div>
                <div class="form-group px-5 pt-2">
                    <label for="correo">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo" name="email"
                        value="{{Auth::user()->email}}" disabled>
                </div>
                <div class="form-group px-5 pt-2">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono"
                        placeholder="{{(Auth::user()->telefono)? Auth::user()->telefono:"0000-0000"}}" required>
                </div>
                <div class="container d-flex justify-content-end pr-5 pt-4">
                    <button type="submit" class="btn btn-primary ml-auto">Actualizar</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection