@extends('layout.default')

@section('contenido')
    <h1 class="page-header">
        Usuarios
        <div class=pull-right>
            {{ HTML::link('/usuario/create', 'Nuevo Usuario', ['class' => 'btn btn-primary']) }}
        </div>
    </h1>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                @include('layout.partials.mensaje')

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
                                            <a href="{{ URL::route('usuario.show', $usuario->id) }}" class="btn btn-info btn-sm">
                                                <i class="fa fa-search-plus"></i>
                                            </a>
                                            <a href="{{ URL::route('usuario.edit', $usuario->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="{{ URL::route('usuario.destroy', $usuario->id) }}" class="btn btn-danger btn-sm" data-method="DELETE" data-confirm="¿Esta seguro que desea eliminar la Provincia?">
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
@stop

@section('script')
    {{ HTML::script('assets/js/laravel.js') }}
@stop
