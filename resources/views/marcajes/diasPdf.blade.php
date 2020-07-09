<?php
use App\marcaje;
use App\Empleado;
$marcaje = marcaje::with('empleados')->get();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdf</title>
    <link href="{{asset('css/estilo.css')}}" rel="stylesheet">
</head>
<body>
<div style="margin-top: 5%; text-align:center;">
    <p id="pPdf">
        Empleado: {{ Auth::user()->name }} {{ Auth::user()->apellido }}&nbsp;&nbsp;  Rut: {{ Auth::user()->cedula }}
    </p>
    <p>
        Fecha desc: {{ date('d-m-y') }}&nbsp; Hora: {{ date('H:i:s') }}&nbsp;
        <?php
         $mes = date('m');
         if($mes = 01){
            echo "Mes: Enero";
         }elseif($mes = 02){
            echo "Mes: Febrero";
         }elseif($mes = 03){
            echo "Mes: Marzo";
         }elseif($mes = 04){
            echo "Mes: Abril";
         }elseif($mes = 05){
            echo "Mes: Mayo";
         }elseif($mes = 06){
            echo "Mes: Junio";
         }elseif($mes = 07){
            echo "Mes: Julio";
         }elseif($mes = 08){
            echo "Mes: Agosto";
         }elseif($mes = 09){
            echo "Mes: Septiembre";
         }elseif($mes = 10){
            echo "Mes: Octubre";
         }elseif($mes = 11){
            echo "Mes: Noviembre";
         }elseif($mes = 12){
            echo "Mes: Diciembre";
         }
        ?>
    </p>
</div>
<table border="0.5" style="justify-content:center; position:absolute;" id="table2">
    <tr id="trTableHome2">
        <td>Hora entrada</td>
        <td>Hora salida</td>
        <td>Fecha</td>
    </tr>
    @foreach($marcaje as $marc)
    
        <?php
        $fecha = $marc->fecha;
        $timestamp = strtotime($fecha);  
        $date = date('d-m-Y', $timestamp );
        $fv = date('m', $timestamp );
            if(Auth::user()->id == $marc->id_empleado && $fv == date('m')){
                echo "<tr><td>{$marc->hora_entrada}</td>";
                echo "<td>{$marc->hora_salida}</td>";
                
                echo "<td>{$date}</td></tr>";
            }
        ?>
    
    @endforeach
</table>
</body>
</html>