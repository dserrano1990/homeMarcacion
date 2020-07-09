@extends("../layouts.plantilla")

@section("cabecera")

@endsection

@section("contenido")

<form method="post" action="/empleados/{{$empleado->id}}">
<div id="datos">
        <h1>Editar datos</h1></br>
        <table id="tablaCrear">
            <tr>
                <td id="nom">Nombre</td>
                <td><input class="form-control" type="text" placeholder="nombre" name="name" value="{{$empleado->name}}"></td>
                @method('PUT')
                {{csrf_field()}}
            </tr>
            <tr>
                <td id="nom">Apellido&nbsp&nbsp</td>
                <td><input class="form-control" type="text" placeholder="apellido" name="apellido" value="{{$empleado->apellido}}"></td>
            </tr>
            <tr>
                <td id="nom">Rut&nbsp&nbsp</td>
                <td><input class="form-control" type="text" placeholder="rut" name="cedula" value="{{$empleado->cedula}}"></td>
            </tr>
            <tr>
                <td id="nom">Email&nbsp&nbsp</td>
                <td><input class="form-control" type="text" placeholder="email@gmail.com" name="email" value="{{$empleado->email}}"></td>
            </tr>
            <tr>
                <td id="nom">Password&nbsp&nbsp</td>
                <td><input class="form-control" type="password" placeholder="contraseña" name="password" value="{{$empleado->password}}"></td>
            </tr>
            <tr>
                <td id="nom">Sexo&nbsp&nbsp</td>
                <td><input class="form-control" type="text" placeholder="masculino" name="sexo" value="{{$empleado->sexo}}"></td>
            </tr>
            <tr>
                <td id="nom">Estado civil&nbsp&nbsp</td>
                <td><input class="form-control" type="text" placeholder="solter@" name="estado_civil" value="{{$empleado->estado_civil}}"></td>
            </tr>
            <tr>
                <td id="nom">Teléfono&nbsp&nbsp</td>
                <td><input class="form-control" type="text" placeholder="98877654" name="telefono" value="{{$empleado->telefono}}"></td>
            </tr>
            <tr>
                <td ><input type="reset" value="borrar texto" id="borrarTxt"></td>
                <td><input type="submit" value="enviar" id="enviar"></td>
            </tr>
        </table>
    </div>
</form>

@endsection

@section("pie")

@endsection