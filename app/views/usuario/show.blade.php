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
                        <h3 class="panel-title">Mostrar usuario</h3>
                    </div>

                    <div class="panel-body">

                        <dl class="dl-horizontal">
                            <dt>Codigo:</dt>
                            <dd># {{ $usuario->id }}</dd>
                            <dt>Nombre:</dt>
                            <dd>{{ $usuario->first_name }}</dd>
                            <dt>Apellido:</dt>
                            <dd>{{ $usuario->last_name }}</dd>
                            <dt>E-Mail:</dt>
                            <dd>{{ $usuario->email }}</dd>
                            <dt>Tipo:</dt>
                            <dd>{{ $usuario->type }}</dd>
                            <dt>Estado:</dt>
                            <dd>{{ $usuario->active }}</dd>
                        </dl>

                    </div>

                    <div class="panel-footer text-right">
                        <a href="{{ URL::route('usuario.index') }}" class="btn btn-default">
                            <i class="fa fa-times"></i> Volver
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop
