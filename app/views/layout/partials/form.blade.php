<div class="form-group">
    {{ Form::label('first_name', 'Nombre') }}
    {{ Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Igrese su nombre']) }}
</div>
<div class="form-group">
    {{ Form::label('last_name', 'Apellido') }}
    {{ Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Igrese su apellido']) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'E-Mail') }}
    {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Igrese su email']) }}
</div>
<div class="form-group">
    {{ Form::label('password', 'Contraseña') }}
    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Igrese su contraseña']) }}
</div>
<div class="form-group">
    {{ Form::label('type', 'Tipo de Usuario') }}
    {{ Form::select('type', ['' => 'Seleccione tipo', 'admin' => 'Administrador', 'user' => 'Usuario'], null, ['class' => 'form-control']) }}
</div>
