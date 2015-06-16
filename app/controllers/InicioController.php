<?php

class InicioController extends \BaseController
{
    public function index()
    {
        return View::make('inicio.index');
    }
}
