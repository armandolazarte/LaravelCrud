@extends('layout.default')

@section('contenido')
    <h1 class="page-header">
        Usuarios
    </h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Crear usuario</h3>
                    </div>

                    {{ Form::open(['route' => 'usuario.store']) }}
                    <div class="panel-body">

                        @include('layout.partials.mensaje')

                        @include('layout.partials.form')

                    </div>

                    <div class="panel-footer text-right">
                        <a href="{{ URL::route('usuario.index') }}" class="btn btn-default">
                            <i class="fa fa-times"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-floppy-o"></i> Guardar
                        </button>
                    </div>
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
@stop
