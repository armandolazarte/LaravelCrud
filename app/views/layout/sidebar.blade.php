<ul class="nav nav-sidebar">
    <li {{ Request::is('/') ? 'class="active"' : '' }}>
        {{ HTML::link('/', 'Inicio')}}
    </li>
    <li {{ Request::is('usuario') ? 'class="active"' : '' }}>
        {{ HTML::link('/usuario', 'Usuarios', ['id' => 'homeUsuario'])}}
    </li>
    <li {{ Request::is('usuario-ajax') ? 'class="active"' : '' }}>
        {{ HTML::link('/usuario-ajax', 'Usuarios Ajax', ['id' => 'homeUsuarioAjax'])}}
    </li>
</ul>
