@extends('layouts.app')
@extends("../layouts.plantilla")

@section("cabecera")

@endsection

@section("contenido")

<form method="post" action="/empleados">
    <div id="datos">
        <h1>Ingresar datos</h1></br>
        <table id="tablaCrear">
            <tr>
                <td id="nom">Nombre&nbsp&nbsp</td>
                <td><input class="form-control" type="text" placeholder="nombre" name="name"></td>
                {{csrf_field()}}
            </tr>
            <tr>
                <td id="nom">Apellido&nbsp&nbsp</td>
                <td><input class="form-control" type="text" placeholder="apellido" name="apellido"></td>
            </tr>
            <tr>
                <td id="nom">Rut&nbsp&nbsp</td>
                <td><input class="form-control" type="text" placeholder="112223334" name="cedula"></td>
            </tr>
            <tr>
                <td id="nom">Email&nbsp&nbsp</td>
                <td><input class="form-control" type="text" placeholder="email@gmail.com" name="email"></td>
            </tr>
            <tr>
                <td id="nom">Password&nbsp&nbsp</td>
                <td><input class="form-control" type="password" placeholder="contraseña" name="password"></td>
            </tr>
            <tr>
                <td id="nom">Sexo&nbsp&nbsp</td>
                <td><input class="form-control" type="text" placeholder="masculino" name="sexo"></td>
            </tr>
            <tr>
                <td id="nom">Estado civil&nbsp&nbsp</td>
                <td><input class="form-control" type="text" placeholder="solter@" name="estado_civil"></td>
            </tr>
            <tr>
                <td id="nom">Teléfono&nbsp&nbsp</td>
                <td><input class="form-control" type="text" placeholder="98877654" name="telefono"></td>
            </tr>
            <tr>
                <td id="nom">Tipo usuario&nbsp&nbsp</td>
                <td><select name="id_role" id="nom" class="form-control" required="required" style="text-align:center;">
                    <option selected="true" disabled="disabled">-- seleccione --</option>
                    @foreach($role as $rol)
                        <option value="{{$rol['id']}}">{{$rol['nombre_rol']}}</option>
                    @endforeach
                </select></td>
            </tr>
            <tr>
                <td><input type="reset" value="borrar texto" id="borrarTxt"></td>
                <td><input type="submit" value="enviar" id="enviar"></td>
            </tr>
        </table>
    </div>
    
</form>

@endsection

@section("pie")

@endsection