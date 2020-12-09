@extends('dashboard')

@section('css')
<!-- Switchery -->
<link href="{{ asset('dashboard/vendor/switchery/dist/switchery.min.css') }}"
    rel="stylesheet">
@endsection



@section('content')

<div class="row">
    <div class="col-md-5 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>{{ $user!=null?'Actualizar':'Registrar' }}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <form id="demo-form2"
                    action="{{ $action=='insertar'?route('usuarios.store'):route('usuarios.update',$user->id) }}"
                    data-parsley-validate class="form-horizontal form-label-left" method="POST">
                    @csrf
                    @switch($action)
                        @case('editar')
                            @method('PUT')
                            @break
                        @default
                            @method('POST')
                            @break
                    @endswitch
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre">Nombre completo <span
                                class="required"></span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                            <input type="text" id="nombre" required="required" class="form-control "
                                value="{{ $user!=null?$user->nombre:'' }}" name="nombre">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="correo">Correo <span
                                class="required"></span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                            <input type="email" id="correo"
                                value="{{ $user!=null?$user->email:'' }}" name="email"
                                required="required" class="form-control">
                        </div>
                   
                    </div>
                    <div class="form-group text-center">
                        @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="contrasena">Contraseña <span
                                class="required"></span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                            <input type="password" id="contrasena" name="password" {{ $user!=null?'':'required'}}
                                class="form-control">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        @error('password')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="telefono">Teléfono <span
                                class="required"></span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                            <input type="tel" id="telefono"
                                value="{{ $user!=null?$user->telefono:'' }}"
                                name="telefono" required="required" class="form-control tel"
                                data-validate-length-range="8,20">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="rol">Rol <span
                                class="required"></span>
                        </label>
                        <div class="col-md-9 col-sm-6 ">
                            <select class="form-control" name="role" id="rol">
                                <option value="1"
                                    {{ $user!=null?($user->role_id==1?'selected':''):'' }}>
                                    Administrador</option>
                                <option value="0"
                                    {{ $user!=null?($user->role_id==0?'selected':''):'' }}>
                                    Empleado</option>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="activo">Activo <span
                                class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            No <input type="checkbox" class="js-switch"
                                {{ $user!=null?($user->activo?'checked':''):'' }}
                                name="activo" id="activo" /> Si
                        </div>
                    </div>

                    <div class="ln_solid"></div>

                    <div class="item form-group text-center">
                        <div class="col-md-6 col-sm-6 offset-md-3 mt-3">
                            <a href="{{ route('usuarios.index') }}" class="btn btn-primary"
                                type="reset">Nuevo</a>
                            <button type="submit"
                                class="btn  text-white btn-{{ $user!=null?'warning':'success' }}">{{ $user!=null?'Actualizar':'Crear' }}</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-7 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">

                <h2>Usuarios</h2>

                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>

                <div class="clearfix"></div>

            </div>

            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">

                            <table id="datatable-responsive"
                                class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                width="100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Correo</th>
                                        <th>Teléfono</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $u)
                                        @if($u->id!=Auth::user()->id)
                                            <tr>
                                                <td>{{ $u->nombre }}</td>
                                                <td>{{ $u->email }}</td>
                                                <td>{{ $u->telefono }}</td>
                                                <td>{{ $u->role_id==1?'Administrador':'Empleado' }}
                                                </td>
                                                <td>
                                                    <div class="row justify-content-end  ">

                                                        <div class="col-12 md-3">
                                                            <form method="POST"
                                                                action="{{ route('usuarios.destroy',$u->id) }}">
                                                                @method('DELETE')
                                                                @csrf
                                                                <a href="{{ route('usuarios.edit',$u->id) }}"
                                                                    class="btn btn-small btn-warning text-light mt-2"
                                                                    data-toggle="tooltip" data-placement="left"
                                                                    title="Editar"><span class="fa fa-edit"></span></a>
                                                                <button type="submit"
                                                                    class="btn btn-small btn-danger text-light mt-2"
                                                                    data-toggle="tooltip" data-placement="left"
                                                                    title="Eliminar"><span
                                                                        class="fa fa-trash"></span></button>
                                                            </form>
                                                        </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('scripts')
        <!-- Switchery -->
        <script src="{{ asset('dashboard/vendor/switchery/dist/switchery.min.js') }}">
        </script>
        @endsection
