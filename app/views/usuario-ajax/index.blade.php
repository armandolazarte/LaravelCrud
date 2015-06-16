@extends('layout.default')

@section('contenido')
    <h1 class="page-header">
        Usuarios
        <div class=pull-right>
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#crearUsuario" id="btnCrearUsuario">Nuevo Usuario</a>
        </div>
    </h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Listado de usuarios</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped vertical-align">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre y Apellido</th>
                                        <th>E-Mail</th>
                                        <th>Tipo</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id }}</td>
                                        <td>{{ $usuario->full_name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->type }}</td>
                                        <td>{{ $usuario->active }}</td>
                                        <td>
                                            <a href="" class="btn btn-info btn-sm btnMostrarUsuario" data-url="{{ URL::route('usuario-ajax.show', $usuario->id) }}" data-id="{{ $usuario->id }}" data-toggle="modal" data-target="#mostrarUsuario">
                                                <i class="fa fa-search-plus"></i>
                                            </a>
                                            <a href="" class="btn btn-warning btn-sm btnEditarUsuario" data-url="{{ URL::route('usuario-ajax.edit', $usuario->id) }}" data-id="{{ $usuario->id }}" data-toggle="modal" data-target="#editarUsuario">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash-o"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="panel-footer text-right">
                        {{ $usuarios->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('usuario-ajax.create')
    @include('usuario-ajax.show')
    @include('usuario-ajax.edit')
@stop

@section('script')
    {{ HTML::script('assets/js/usuario-ajax.js') }}
@stop
