<?php

class UsersAjaxController extends \BaseController
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

        return View::make('usuario-ajax.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     * GET /users/create.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * POST /users.
     *
     * @return Response
     */
    public function store()
    {
        if (Session::token() !== Input::get('_token')) {
            return Response::json(array(
                'mensaje' => 'No Autorizado',
            ));
        }

        $datos = Input::all();

        $reglas = [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required',
            //'active'     => 'required',
            'type'       => 'required|in:admin,user',
        ];

        $validar = Validator::make($datos, $reglas);

        if ($validar->passes()) {
            $usuario = new User($datos);

            if ($usuario->save()) {
                if (Request::ajax()) {
                    return Response::json([
                        'success' => true,
                        'mensaje' => 'Usuario agregado',
                    ], 200);
                }
            } else {
                return Redirect::to('usuario')->withErrors('Error');
            }
        } else {
            return Response::json([
                'success' => false,
                'mensaje' => $validar->errors()->toArray(),
            ], 200);
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

        if (Request::ajax()) {
            return Response::json($usuario, 200);
        }
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

        if (Request::ajax()) {
            return Response::json($usuario, 200);
        }
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
        if (Session::token() !== Input::get('_token')) {
            return Response::json(array(
                'mensaje' => 'No Autorizado',
            ));
        }

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

            if ($usuario->save()) {
                if (Request::ajax()) {
                    return Response::json([
                        'success' => true,
                        'mensaje' => 'Usuario actualizado',
                    ], 200);
                }
            } else {
                return Redirect::to('usuario')->withErrors('Error');
            }
        } else {
            return Response::json([
                'success' => false,
                'mensaje' => $validar->errors()->toArray(),
            ], 200);
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
        //
    }
}
