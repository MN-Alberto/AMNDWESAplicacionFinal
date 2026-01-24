<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CFGS - Desarrollo de Aplicaciones Web</title>
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
            height: 100px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            border-bottom: 1px solid green;
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
            height: 620px;
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
        footer{
            margin: auto;
            background-color: #242222;
            text-align: center;
            height: 100px;
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
            width: 880px;
            height: 400px;
            margin: 0 auto;
            background-color: blanchedalmond;
            display: flex;
            justify-content: center;
            align-items: center;
            top: 100px;
        }
        
        .carrusel{
            position: relative;
            width: 900px;
            height: 560px;
            overflow: hidden;
        }

        .carrusel .fotos{
            display: flex;
        }

        .fotos{
            transition: all 0.5s ease;
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
            border: 1px solid black;
            width: 500px;
            top: 20px;
            left: 130px;
            color: black;
            text-align: left !important;
            align-items: left !important;
            border-radius: 10px;
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
            width: 1000px;
            height: 600px;
            margin-top: 60px;
        }

        .tablaDept table{
            width: 800px;
        }

        .tablaDept th{
            color: green;
        }
        
        #buscarDesc{
            width: 300px !important;
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
        <p><a href="../AMNDWESAplicacionFinal/indexAplicacionFinal.php">Alberto Mendez Nuñez</a></p>
        <a href="https://github.com/MN-Alberto/AMNDWESAplicacionFinal" target="_blank"><img src="webroot/img.png" height="40px"/></a>
        <a href="https://www.minecraft.net/es-es" target="_blank"><img src="webroot/cubo.png" height="40px"/></a>
        <a href="webroot/alberto_mendez_cv.pdf" target="_blank"><img src="webroot/curriculum.png" height="40px"/></a>
    </footer>
</body>
</html>