<?php

class UsersController extends \BaseController
{
    /**
     * Display a listing of the resource.
     * GET /users.
     *
     * @return Response
     */
    public function index()
    {
        $usuarios = User::orderBy('id', 'DESC')->paginate(6);

        return View::make('usuario.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     * GET /users/create.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     * POST /users.
     *
     * @return Response
     */
    public function store()
    {
        $datos = Input::all();

        $reglas = [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required',
            'type'       => 'required|in:admin,user',
        ];

        $validar = Validator::make($datos, $reglas);

        if ($validar->passes()) {
            $usuario = new User($datos);
            $usuario->save();

            return Redirect::route('usuario.index')->with('exito', 'El usuario fue creado');
        } else {
            return Redirect::back()->withInput()->withErrors($validar);
        }
    }

    /**
     * Display the specified resource.
     * GET /users/{id}.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $usuario = User::findOrFail($id);

        return View::make('usuario.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     * GET /users/{id}/edit.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);

        return View::make('usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     * PUT /users/{id}.
     *
     * @param int $id
     *
     * @return Response
     */
    public function update($id)
    {
        $datos = Input::all();

        $reglas = [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users,email,' . $id,
            'type'       => 'required|in:admin,user',
        ];

        $validar = Validator::make($datos, $reglas);

        if ($validar->passes()) {
            $usuario = User::findOrFail($id);
            $usuario->fill($datos);
            $usuario->save();

            return Redirect::route('usuario.index')->with('exito', 'El usuario fue actualizado');
        } else {
            return Redirect::back()->withInput()->withErrors($validar);
        }
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /users/{id}.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return Redirect::route('usuario.index')->with('exito', 'El usuario fue eliminado');
    }
}
