<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empleado;

use App\Http\Requests\CreateEmpleadosRequest;

use Illuminate\Support\Facades\Hash;

use App\Role;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $empleados = Empleado::all();
        return view("empleados.listar", compact("empleados"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //return view("empleados.create");
        $role = Role::all();
        return view("empleados.create", compact("role"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEmpleadosRequest $request)
    {
        //
        //$entrada = $request->all();
        Empleado::create([
            'name' => $request['name'],
            'apellido' => $request['apellido'],
            'cedula' => $request['cedula'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'sexo' => $request['sexo'],
            'estado_civil' => $request['estado_civil'],
            'telefono' => $request['telefono'],
            'id_role' => $request['id_role'],
        ]);
        //Empleado::create($entrada);
        return redirect('/empleados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateEmpleadosRequest $request, $id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());
        return redirect('/empleados');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return redirect('/empleados');
    }

}
