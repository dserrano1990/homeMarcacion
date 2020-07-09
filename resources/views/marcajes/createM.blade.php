@extends('layouts.app')
@extends("../layouts.plantilla")

@section("cabecera")

@endsection

@section("contenido")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$titulo}}</div>
                <?php

                    $tit = $titulo;
                    if($tit != "Día laboral terminado"){
                        echo '<div class="card-body">
                        Nombre completo: ' . "{$empleado->name} {$empleado->apellido}" .'</br>
                        Rut: '. "{$empleado->cedula}" . ', Teléfono: ' . "{$empleado->telefono}" . '</br>
                        Hora: ' . date('H:i') .', Fecha: ' . date('d-m-y') . '</br>
                        <table>
                            <td></td>
                        </table>
                        <form method="post" action="/marcajes">
                        '.csrf_field().'
                            <input type="hidden" value= '."{$empleado->id}".' name="id">
                            <!--button id="btnMarcar" type="submit">marcar</button-->
                            <input type="submit" value="marcar" id="btnMarcar">
                        </form>
                    </div>';
                    }

                ?>
                <!--div class="card-body">
                    Nombre completo: {{$empleado->name}} {{$empleado->apellido}}</br>
                    Rut: {{$empleado->cedula}} , Teléfono: {{$empleado->telefono}}</br>
                    Hora: {{ date('H:i') }} , Fecha: {{ date('d-m-y') }}</br>
                    <table>
                        <td></td>
                    </table>
                    <form method="post" action="/marcajes">
                    {{csrf_field()}}
                        <input type="hidden" value="{{$empleado->id}}" name="id">
                        <input type="submit" value="marcar" id="btnMarcar">
                    </form>
                </div-->
            </div>
        </div>    
    </div>
</div>    
@endsection

@section("pie")

@endsection