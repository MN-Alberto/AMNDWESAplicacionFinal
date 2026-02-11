<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aplicacion Final</title>
    
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background: #171615;
            margin: 0;
            padding: 0;
            background-color: #3d3938;
        }
        
        header {
            background: #242222;
            color: #ffffff;
            padding: 15px;
            text-align: center;
            display: flex;
            flex-direction: row;
            align-items: center;
            height: 80px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            border-bottom: 1px solid green;
        }
        
        #fRegistro{
            margin-top: 40px;
        }
        
        #imagenIcon{
            width: 100px;
            height: 100px;
        }
        
        .eliminarUser{
            position: relative;
            left: -260px;
            top: 280px;
        }
        
        #eliminarUser{
            background: red;
            color: white;
            border: none;
            border-radius: 5px;
        }
        
        #eliminarUser:hover{
            scale:1 !important;
            cursor: pointer;
        }
        
        #h1Publico{
            margin-right: 450px;
        }
        
        #f1{
           margin-top: 40px; 
        }
        
        #f2{
            position: relative;
            left: 60%;
        }
        
        h1 {
            margin: 0;
            font-family: "titulo";
            font-size: 60px;
        }
        main {
            width: 1000px;
            margin: 30px auto;
            padding: 20px;
            /*height: 620px;
            */
            min-height: 620px;
            color: white;
            margin-top: 150px;
        }
        
        .mDetalle{
            max-width: 1400px;
            margin: 30px auto;
            padding: 20px;
            background: #3d3938;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            height: auto;
            text-align:center;
            justify-content:center;
            color: white;
        }
        
        .mDetalle h2,h3{
            color: #64c349;
            text-decoration: underline;
        }
        
        main img{
            height: 555px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        
        #fPregunta{
            margin-top: 50px;
        }
        
        footer{
            margin: auto;
            background-color: #242222;
            text-align: center;
            height: 50px;
	        color: white;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            border-top: 1px solid green;
        }
        main{
        text-align:center;
        justify-content:center;
        }

        a{
            text-decoration: none;
            color:purple;
        }
        
        table{
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            width: 50%;
            border-width: 4px;
        }
        
        td{
            padding: 10px;
            border-width: 4px;
        }
        
        #encabezado{
            background-color: lightsteelblue;
            font-weight: bold;
        }
        
        .codigos{
            background-color: lightblue;
        }
        
        .mostrar{
            background-color: lightsalmon;
        }
        
        tr{
            height: 80px;
        }
        h2{
            text-align: center;
            /* font-family: "texto"; */
        }
        input{
            background-color: #52a535;
            width: 140px;
            height: 40px;
            cursor: pointer;
            /* font-family: "texto"; */
            border-radius: 10px;
        }
        
        #usuario{
            background: lightyellow;
        }
        
        #pass{
            background: lightyellow;
        }
        
        #desc{
            background: lightyellow;
        }
        
        label{
            /* font-family: "texto"; */
        }
        
        .btn:active{
            background-color: green;
        }
        

        @font-face {
            font-family: 'titulo';
            src: url('webroot/MinecraftTen-VGORe.ttf');
        }
        
        @font-face {
            font-family: 'texto';
            src: url('webroot/Minecraft.ttf');
        }
        
        
        p{
            color: #64c349;
            /* font-family: 'texto'; */
        }
        
        h3{
            /* font-family: 'texto'; */
        }
        
        a{
            color: #64c349;
            text-decoration: underline;
        }
        
        img{
            background-color: inherit;
        }
        
        #arbol{
            width: 700px;
            height: 450px;
            margin-top: 20px;
        }

        #tituloIdiomas{
            margin-left: 350px;
            margin-right: 35px;
        }
        
        #español{
            background-image: url(./webroot/banderaEspaña.png);
            background-size: cover;
            border: none;
            background-repeat: no-repeat;
            width: 35px;
            height: 25px;
            cursor: pointer;
            margin-right: 10px;
            transition: all 0.5s ease;
        }

        #ingles{
            background-image: url(./webroot/banderaIngles.jpg);
            background-size: cover;
            border: none;
            background-repeat: no-repeat;
            width: 35px;
            height: 25px;
            cursor: pointer;
            margin-right: 10px;
            transition: all 0.5s ease;
        }

        #portugues{
            background-image: url(./webroot/banderaPortugal.png);
            background-size: cover;
            border: none;
            background-repeat: no-repeat;
            width: 35px;
            height: 25px;
            cursor: pointer;
            margin-right: 10px;
            transition: all 0.5s ease;
        }

        #ruso{
            background-image: url(./webroot/banderaRusia.png);
            background-size: cover;
            border: none;
            background-repeat: no-repeat;
            width: 35px;
            height: 25px;
            cursor: pointer;
            transition: all 0.5s ease;
        }
        
        #botonBuscarDesc{
            background-image: url(./webroot/lupa.png);
            background-size: cover;
            border: none;
            background-repeat: no-repeat;
            width: 40px;
            height: 40px;
            cursor: pointer;
            transition: all 0.5s ease;
            background-color: transparent;
            margin-right: 10px;
            margin-left: 20px;
        }
        
        #botonAltaDept{
            background-image: url(./webroot/mas.png);
            background-size: contain;
            border: none;
            background-repeat: no-repeat;
            width: 40px;
            height: 40px;
            cursor: pointer;
            transition: all 0.5s ease;
            background-color: transparent;
            margin-right: 10px;
            position: relative;
            left: 360px;
            top: 70px;
        }
        
        #botonEditarDept{
            background-color: transparent;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        #botonEditarUser{
            background-color: transparent;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        #botonVerUser{
            background-color: transparent;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        #botonVerDept{
            background-color: transparent;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        #botonEliminarDept{
            background-color: transparent;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        #botonEliminarU{
            background-color: transparent;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        #Login{
            position: absolute;
            right: 160px;
            background-image: url(./webroot/login.png);
            background-size: cover;
            border: none;
            background-repeat: no-repeat;
            width: 55px;
            height: 55px;
            background-color: transparent;
            cursor: pointer;
            top: 40px;
            transition: all 0.5s ease;
        }

        #cerrarSesion{
            position: absolute;
            right: 50px;
            transition: all 0.5s ease;
        }

        #cerrar{
            background-image: url(./webroot/logoff.png);
            background-size: cover;
            border: none;
            background-repeat: no-repeat;
            width: 100px;
            height: 100px;
            background-color: transparent;
            cursor: pointer;
            top: 40px;
            transition: all 0.5s ease;
        }

        #volverForm{
            position: absolute;
            right: 70px;
            transition: all 0.5s ease;
        }
        
        .botones{
            transition: all 0.4s ease;
        }
        
        .botones:hover{
            background-color: lightgreen;
        }

        #volver{
            background-image: url(./webroot/volver.png);
            background-size: cover;
            border: none;
            background-repeat: no-repeat;
            width: 60px;
            height: 60px;
            background-color: transparent;
            cursor: pointer;
            top: 40px;
            transition: all 0.5s ease;
        }
        
        #volverUsuario{  
            background-image: url(./webroot/volver.png);
            background-size: cover;
            border: none;
            background-repeat: no-repeat;
            width: 60px;
            height: 60px;
            background-color: transparent;
            cursor: pointer;
            position: absolute;
            transition: all 0.5s ease;
            top: -30px;
            right: 40px;
        }

        #mainRest{
            width: 1800px !important;
            height: auto !important;
            margin-bottom: 100px;
        }

        #tablaRest{
            border: 2px solid white;
            border-radius: 10px;
            margin-top: 50px;
            width: 80%;
            padding: 0;
            & td{
                border: 2px solid white;
                width: 300px;
                border-radius: 10px;
            }
        }

        #imagenNasa{
            width: 350px;
            height: 350px;
            transition: all 0.5s ease;
            border-radius: 10px;
        }
        
        #imagenNasa:hover{
            scale: 1.4;
            border-radius: 0px;
        }

        #mainPublico{
            width: 1200px !important;
            height: 640px !important;
        }

        #mainPublico h1{
            position: relative;
            top: -50px;
        }
        
        #fecha{
            background: lightcyan !important;
            width: 100px;
        }
        
        #fFecha{
            margin-bottom: 30px;
        }
        
        #enviar{
            width: 80px;
            transition: all 0.5s ease;
        }
        
        
        .container{
            position: relative;
            width: 1000px;
            height: 600px;
            margin: 0 auto;
            /* background-color: blanchedalmond; */
            display: flex;
            justify-content: center;
            align-items: center;
            top: -30px;
        }
        
        .container {
            display: flex;
            justify-content: center;
        }

        .fotos {
            position: relative; /* referencia para las imágenes */
            width: 1000px;       /* ajusta al tamaño que quieras */
            height: 600px;
        }

        .fotos img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: contain; /* o cover si prefieres */
        }

        #foto1{
            display: block;
            transition: all 0.3s ease;
        }

        #foto1:hover{
            scale: 1.10;
        }

        #foto2{
            display: none;
            transition: all 0.3s ease;
        }

        #foto2:hover{
            scale: 1.10;
        }

        #foto3{
            display: none;
            transition: all 0.3s ease;
        }

        #foto4{
            display: none;
            transition: all 0.3s ease;
        }

        #foto4:hover{
            scale: 1.30;
        }

        .botonesCarrusel{
            position: absolute;
            top: 620px;
            left: 380px;
            /* display: flex;
            flex-direction: row; */
            display: grid;
            grid-template-columns: repeat(4, 1fr);
        }

        .botonesCarrusel div{
            margin-right: 20px;
        }

        .botonesCarrusel div:hover{
            scale: 1.05;
        }

        .boton1{
            border-radius: 50%;
            width: 45px;
            height: 45px;
            background: lightgreen;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .boton2{
            border-radius: 50%;
            width: 45px;
            height: 45px;
            background: wheat;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .boton3{
            border-radius: 50%;
            width: 45px;
            height: 45px;
            background: wheat;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .boton4{
            border-radius: 50%;
            width: 45px;
            height: 45px;
            background: wheat;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .bRadio{
            position: absolute;
            left: 50px;
            bottom: 25px;
            z-index: 100;
        }

        #r1{
            left: 35px;
        }
        #r2{
            left: 120px;
        }

        .bRadio::after{
            content: "";
            position: absolute;
            width: 30px;
            height: 30px;
            left: -17px;
            top: -10px;
            border-radius: 50%;
        }

        #r1:focus-within ~ .fotos {transform: translateX(0px);}
        #r2:focus-within ~ .fotos {transform: translateX(-400px);}
        
        #salir{
            position: absolute;
            right: 80px;
            background-image: url(./webroot/volver.png);
            background-size: cover;
            border: none;
            background-repeat: no-repeat;
            width: 55px;
            height: 55px;
            background-color: transparent;
            cursor: pointer;
            top: 40px; 
            transition: all 0.5s ease;
        }
        
        button:hover{
            scale: 1.30;
        }
        
        #editarUsuario{
            position: absolute;
            right: 120px;
            background-image: url(./webroot/login.png);
            background-size: cover;
            border: none;
            background-repeat: no-repeat;
            width: 55px;
            height: 55px;
            background-color: transparent;
            cursor: pointer;
            top: 25px;
            transition: all 0.5s ease; 
        }
        
        .contenidoEditar{
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
        }
        
        .formularioEditar{
            width: 800px;
            height: 500px;
            background: white;
            margin-top: 35px;
            border-radius: 10px;
        }
        
        #foto img{
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        #foto{
            position: absolute;
            top: 300px;
            left: 600px;
        }

        #tablaDatos{
            position: relative;
            width: 500px;
            top: 20px;
            left: 130px;
            color: black;
            text-align: left !important;
            align-items: left !important;
            border-radius: 10px;
        }

        .botonCentro{
            text-align: center;
        }

        #aceptarCambios{
            height: 40px;
            width: 140px;
            border-radius: 10px;
            transition: all 0.5s ease;
            background: green;
            cursor: pointer;
        }

        #aceptarCambios:hover{
            scale: 1.10 !important;
        }
        
        #tablaDatos tr{
            height: 40px;
        }
        
        #formDatos input{
            width: 240px;
            background-color: #D1F5C1;
        }
        
        #cambiarDesc{
            background-color: lightgreen !important;
        }
        
        #nasaHD{
            width: 650px;
            height: 650px;
        }

        #mantenimientoDept{
            width: 1200px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        #mantenimientoDept h1{
            position: relative;
            top: -30px;
        }

        .tablaDept{
            width: 1400px;
            /*height: 600px;
            */
            min-height: 600px;
            margin-top: 60px;
        }

        .tablaDept table{
            width: 1400px;
        }

        .tablaDept th{
            color: black;
            background: #d0c5c0;
            border-collapse: collapse;
            border: 1px solid black;
        }
        
        .tablaDept td{
            color: black;
            border-collapse: collapse;
            border: 1px solid black;
        }

        #fOpciones{
            width: 280px;
        }

        .tablaDept td:last-of-type{
            width: 200px;
        }
        
        .tablaDept tr:nth-child(1){
            height: 40px;
            font-size: 1.2rem;
        }
        
        #buscarDesc{
            width: 300px !important;
            background: white;
            margin-left: 20px;
        }
        
        .formDept{
            border: 1px solid black;
            width: 600px;
            height: 100px;
            background-color: #3c3c3c;
            border-radius: 10px;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            justify-items: center;
            align-items: center;
        }
      
        .tablaUsers th{
            color: black;
            background: #d0c5c0;
            border-collapse: collapse;
            border: 1px solid black;
        }


        #mantenimientoUsers h1 {
            text-align: center;
        }
        
        #botonVerUser{
            transition: all 0.3s ease;
        }
        
        #botonEditarUser{
            transition: all 0.3s ease;
        }


        .formUsers {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 40px;
            margin-bottom: 40px;
        }


        .tablaUsers {
            width: 1000px;
            display: flex;
            justify-content: center;
            margin-bottom: 50px;
        }

        .tablaUsers table {
            width: 1000px;
            border-collapse: collapse;
        }

        .tablaUsers th,
        .tablaUsers td {
            text-align: center;
            border: 1px solid #ccc;
        }


        .tablaUsers th {
            font-weight: bold;
        }


        .tablaUsers td form {
            display: flex;
            justify-content: center;
            gap: 5px;
        }
        
        #fEditDept{
            display: flex;
            flex-direction: column;
            
        }

        #fEditDept {
            max-width: 500px;
            margin: 30px auto;
            padding: 25px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            font-family: Arial, Helvetica, sans-serif;
        }

        #fEditDept {
            max-width: 600px;
            margin: 30px auto;
            padding: 25px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            font-family: Arial, Helvetica, sans-serif;

            display: grid;
            grid-template-columns: 180px 1fr;
            row-gap: 15px;
            column-gap: 15px;
            align-items: center;
        }

        #fEditDept label {
            text-align: right;
            font-weight: bold;
            color: #333;
        }

        #fEditDept input[type="text"] {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            box-sizing: border-box;
        }

        #fEditDept input:disabled {
            background-color: #e9e9e9;
            color: #666;
            cursor: not-allowed;
        }

        #fEditDept input[type="text"]:focus {
            outline: none;
            border-color: #007BFF;
            box-shadow: 0 0 4px rgba(0,123,255,0.4);
        }

        #btnConfEdit {
            grid-column: 1 / -1;
            justify-self: center; 

            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.5s ease;
        }

        #btnConfEdit:hover {
            background-color: #0056b3;
            scale: 1.10 !important;
        }
        
        .checks{
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .checks label {
            display: flex;
            align-items: center;
            gap: 4px;
        }
        
        .checks input[type="radio"] {
            width: 20px;
            height: 20px;
            margin: 0; 
        }
    </style>



</head>
<body>
    
    <?php
    
    /*
    * Autor: Alberto Méndez 
    * Fecha de actualización: 18/12/2025
    */
    
        require_once $view[$_SESSION["paginaEnCurso"]]; //Añadimos la pagina en curso para cargarla.
    ?>
    
    <footer>
        <p>Alberto Mendez Nuñez | <a href="https://github.com/MN-Alberto/AMNDWESAplicacionFinal" target="_blank">Repositorio</a> | <a href="https://www.minecraft.net/es-es" target="_blank">Página Imitada</a>
         | <a href="webroot/alberto_mendez_cv.pdf" target="_blank">CV</a>
    </p>
        <!-- <a href="https://github.com/MN-Alberto/AMNDWESAplicacionFinal" target="_blank"><img src="webroot/img.png" height="40px"/></a> -->
        <!-- <a href="https://www.minecraft.net/es-es" target="_blank"><img src="webroot/cubo.png" height="40px"/></a> -->
        <!-- <a href="webroot/alberto_mendez_cv.pdf" target="_blank"><img src="webroot/curriculum.png" height="40px"/></a> -->
    </footer>
</body>
</html>