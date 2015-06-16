<!-- Modal Edit-->
<div class="modal fade" id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="editarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="editarUsuarioLabel">Editar Usuario</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert" id="errorEditarUsuario" style="display: none">
                    <b>Por favor corrige los siguentes errores:</b>
                    <ul></ul>
                </div>

                {{ Form::open(['route' => ['usuario-ajax.update', $usuario->id], 'method' => 'PUT', 'id' => 'frmEditarUsuario']) }}
                    @include('layout.partials.form')
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <i class="fa fa-times"></i> Cerrar
                </button>
                <button type="button" class="btn btn-primary" id="btnActualizarUsuario">
                    <i class="fa fa-floppy-o"></i> Actualizar
                </button>
            </div>
        </div>
    </div>
</div>
