<?php

    if(!isset($_SESSION['userAMNDWESAplicacionFinal'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='inicioPublico';
        header("Location: indexAplicacionFinal.php");
        exit;
    }
    
    if(isset($_REQUEST['cerrar'])){
        $_SESSION["paginaEnCurso"]=$_SESSION['paginaAnterior'];
        header("Location: indexAplicacionFinal.php");
        exit;
    }

    //variable que comprueba si la entrada de los datos es correcta
    $entradaOK=true;
    
    
    //variable que almacena los errores en el campo de descripcion
    $aErrores=[
      'descUsuario' => '',  
    ];
    
    
    //variable que almacena las respuestas del campo de descripcion
    $aRespuestas=[
      'descUsuario' => '' 
    ];

    if(isset($_REQUEST['aceptarCambios'])){
      //almacenamos en el array de errores la validacion del campo descripcion en base a lo introducido en el formulario
      $aErrores['descUsuario']= validacionFormularios::comprobarAlfabetico($_REQUEST['cambiarDesc'],255,0,1);

      //recorremos el array de errores
        foreach ($aErrores as $valorCampo => $error) {
            //si contiene un error
            if ($error != null) {
                //la entradaOK cambia a falso
                $entradaOK = false;
            }
        }

    }

    //si no, significa que el usuario aun no ha pulsado el boton asi que no se realiza nada
    else{
      $entradaOK=false;
    }

    //si la entrada es correcta
    if($entradaOK){
        //nueva variable para almacenar el codigo de usuario en curso
        $codigoUsuario=$_SESSION['userAMNDWESAplicacionFinal']->getCodUsuario();

        //almacenamos la nueva descripcion que cogemos del formulario
        $nuevaDescripcion=$_REQUEST['cambiarDesc'];

        //llamamos a modificar usuario con el codigo y la nueva descripcion como parametro
        UsuarioPDO::modificarUsuario($codigoUsuario, $nuevaDescripcion);

        //actualizamos la sion del usuario con la nueva descripcion
        $_SESSION['userAMNDWESAplicacionFinal']->setDescUsuario($nuevaDescripcion);

        //volvemos al inicio privado
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        header("Location: indexAplicacionFinal.php");
        exit;
    }

    //datos para la vista
    $descripcion=$_SESSION['userAMNDWESAplicacionFinal']->getDescUsuario();
    $nomUsuario=$_SESSION['userAMNDWESAplicacionFinal']->getCodUsuario();
    $nConexiones=$_SESSION['userAMNDWESAplicacionFinal']->getNumConexiones();
    $ultimaConexion=$_SESSION['userAMNDWESAplicacionFinal']->getFechaHoraUltimaConexion()->format('d/m/Y H:i:s');
    $ultimaConexionAnterior=$_SESSION['userAMNDWESAplicacionFinal']->getFechaHoraUltimaConexionAnterior()->format('d/m/Y H:i:s');
    
    require_once $view['Layout'];
?>