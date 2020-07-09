@extends('layouts.app')
@extends("../layouts.plantilla")

@section("cabecera")

@endsection

@section("contenido")

<table border="1">
    <tr id="trTableHome">
        <td>Nombre</td>
        <td>Apellido</td>
        <td>Rut</td>
        <td>Email</td>
        <td>Sexo</td>
        <td>Estado civil</td>
        <td>Teléfono</td>
        <td>Permisos</td>
        <td>Editar</td>
        <td>Eliminar</td>
    </tr>
    @foreach($empleados as $empleado)
    <tr>
        <td>{{$empleado->name}}</td>
        <td>{{$empleado->apellido}}</td>
        <td>{{$empleado->cedula}}</td>
        <td>{{$empleado->email}}</td>
        <td>{{$empleado->sexo}}</td>
        <td>{{$empleado->estado_civil}}</td>
        <td>{{$empleado->telefono}}</td>
        @if($empleado->id_role == 1)
            <td>Administrador</td>
        @elseif($empleado->id_role == 2)
            <td>Normal</td>
        @else
            <td></td>
        @endif
        <td><a href="{{route('empleados.edit', $empleado->id)}}"><input type="button" value="editar"></td></a>
        <form method="post" action="/empleados/{{$empleado->id}}">
            {{csrf_field()}}
            @method('DELETE')
            <td><input type="submit" value="eliminar"></td>
        </form>
    </tr>
    @endforeach
</table>

@endsection

@section("pie")

@endsection