<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HomeMarcación</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/estilo.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</head>
<body>
<div id="contenedor_carga">
	<div id="carga"></div>
    <div id="txtCarga">Cargando</div>
</div>
    <div class="cabecera">
        @yield("cabecera")
        <div id="sideNavigation" class="sidenav">
            <a id="tituloNav">{{ Auth::user()->name }}</a>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="/home">Home&nbsp&nbsp<img src="/images/home.png" id="home"></a>
            <!--a href="{{route('empleados.create')}}">Crear usuario&nbsp&nbsp<img src="/images/addUser.png" id="home"></a-->
            <?php 
            $id_rol = Auth::user()->id_role;
            if($id_rol == 1){
                echo '<a href="/empleados/create">Crear usuario&nbsp&nbsp<img src="/images/addUser.png" id="home"></a>';
                echo '<a href="/empleados">Listar&nbsp&nbsp<img src="/images/listar.png" id="home"></a>';
            }

            ?>
            <a href="/marcajes">D. trabajados&nbsp&nbsp<img src="/images/calendario.png" id="home"></a>
            
            <!--a href="{{route('marcajes.create')}}">Marcar&nbsp&nbsp<img src="/images/marcaje.png" id="home"></a-->

            <?php
                $id = Auth::user()->id;
                echo '<a href="/marcajes/'.$id.'">Marcar&nbsp&nbsp<img src="/images/marcaje.png" id="home"></a>';
            ?>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" id="cerrarSesion">
                {{ __('Cerrar sesion') }}&nbsp&nbsp<img src="/images/cerrarSesion.png" id="home">
            </a>
        </div>
 
    <nav class="topnav">
        <a onclick="openNav()">
        <svg width="30" height="30" id="icoOpen">
        <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
        <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
        <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
        </svg>
        </a>
    </nav>
 
    <div id="main">
    <!-- Add all your websites page content here  -->
    </div>
    </div>

    <div class="contenido">
        @yield("contenido")
        
    </div>

    <div class="pie">
        @yield("pie")
        <div class="footer">
            <p id="copy">&copy; David Serrano&nbsp&nbsp<a href="https://www.linkedin.com/in/david-serrano-6a8530144"><img src="/images/linkedin.png" title="contactar en linkedin" id="linkedin"></a>
            <a href="mailto:d.serranoreuque@gmail.com"><img src="/images/correo.png" title="contactar por correo" id="linkedin"></a></p>
        </div>
    </div>
</body>

<script>

window.onload = function(){

contenedor_carga.style.visibility = 'hidden';
contenedor_carga.style.opacity = '0';

}

function openNav() {
    document.getElementById("sideNavigation").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}
 
function closeNav() {
    document.getElementById("sideNavigation").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}
</script>
</html>