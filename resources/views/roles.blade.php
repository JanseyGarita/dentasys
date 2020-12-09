@extends('dashboard')

    @section('css')

    @endsection



    @section('content')

    <div class="row">
        <div class="col-md-6 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Registrar</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="item form-group text-left">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="nombre">Nombre rol <span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="text" id="nombre" required="required" class="form-control " name="nombre">
                            </div>
                        </div>
                        <!-- <br> -->

                        <div class="ln_solid"></div>

                        <div class="item form-group text-center">
                            <div class="col-md-6 col-sm-6 offset-md-3 mt-3">
                                <button class="btn btn-primary" type="reset">Limpiar</button>
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">

                <h2>Roles</h2>

                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>

                <div class="clearfix"></div>

                </div>

                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="card-box table-responsive">
                
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Rol</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Administrador</td>
                        </tr>
                        <tr>
                            <td>Empleado</td>
                        </tr>
                    </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('scripts')
    
    @endsection