@extends('layouts.app')
@extends("../layouts.plantilla")

@section("cabecera")

@endsection


@section("contenido")
<div id="pdf"><a href="/marcajes/create"><img src="/images/descPdf.png" title="Descardar pdf" id="descPdf"></a></div>
<table border="1">
    <tr id="trTableHome">
        <td>Hora entrada</td>
        <td>Hora salida</td>
        <td>Fecha</td>
    </tr>
    @foreach($marcaje as $marc)
    <tr>
        <?php
        $fecha = $marc->fecha;
        $timestamp = strtotime($fecha);  
        $date = date('d-m-Y', $timestamp );
        $fv = date('m', $timestamp );
            if(Auth::user()->id == $marc->id_empleado && $fv == date('m')){
                echo "<td>{$marc->hora_entrada}</td>";
                echo "<td>{$marc->hora_salida}</td>";
                
                echo "<td>{$date}</td>";
            }
        ?>
        <!--td>{{$marc->hora_entrada}}</td>
        <td>{{$marc->hora_salida}}</td-->
        <!--?php
            $fecha = $marc->fecha;
            $timestamp = strtotime($fecha);  
            $date = date('d-m-Y', $timestamp );
            echo "<td>{$date}</td>"
        ?-->
        
    </tr>
    @endforeach
</table>
@endsection


@section("pie")

@endsection