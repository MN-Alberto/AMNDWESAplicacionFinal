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
            background: url(webroot/fondo.webp);
            background-repeat: no-repeat;
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
            background: #3d3938;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            height: 620px;
            color: white;
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
            background-color: #313131;
            text-align: center;
            height: 100px;
	    color: white;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
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
        }

        #ingles{
            background-image: url(./webroot/banderaIngles.jpg);
            background-size: cover;
            border: none;
            background-repeat: no-repeat;
            width: 35px;
            height: 25px;
            cursor: pointer;
        }

        #portugues{
            background-image: url(./webroot/banderaPortugal.png);
            background-size: cover;
            border: none;
            background-repeat: no-repeat;
            width: 35px;
            height: 25px;
            cursor: pointer;
        }

        #ruso{
            background-image: url(./webroot/banderaRusia.png);
            background-size: cover;
            border: none;
            background-repeat: no-repeat;
            width: 35px;
            height: 25px;
            cursor: pointer;
        }

        #Login{
            position: absolute;
            right: 50px;
            background-image: url(./webroot/login.png);
            background-size: cover;
            border: none;
            background-repeat: no-repeat;
            width: 55px;
            height: 55px;
            background-color: transparent;
            cursor: pointer;
            top: 40px;
        }

        #cerrarSesion{
            position: absolute;
            right: 50px;
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
        }

        #volverForm{
            position: absolute;
            right: 70px;
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
        }

        #mainRest{
            width: 1800px !important;
            height: 2500px !important;
            
        }

        #tablaRest{
            border: 4px solid green;
            margin-top: 50px;
            width: 100%;
            padding: 0;
            & td{
                border: 4px solid green;
                width: 600px;
            }
        }

        #imagenNasa{
            width: 550px;
            height: 300px;
        }

        .codigo{
            text-align: left;
            color:green;
        }

        #mainPublico{
            width: 1800px !important;
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
        <a href="https://github.com/MN-Alberto/AMNDWESProyectoLoginLogoff" target="_blank"><img src="webroot/img.png" height="40px"/></a>
        <a href="https://www.minecraft.net/es-es" target="_blank"><img src="webroot/cubo.png" height="40px"/></a>
        <a href="webroot/alberto_mendez_cv.pdf" target="_blank"><img src="webroot/curriculum.PNG" height="40px"/></a>
    </footer>
</body>
</html>