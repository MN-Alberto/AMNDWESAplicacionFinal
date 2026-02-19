<?php

/*
 * Autor: Alberto Méndez 
 * Fecha de actualización: 16/02/2026
 * 
 */


//comprobamos que el usuario ha pasado por el login
    if(!isset($_SESSION['userAMNDWESAplicacionFinal'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='inicioPublico';
        header("Location: indexAplicacionFinal.php");
        exit;
    }
    
//si clicamos en cerrar volvemos al mantenimiento de departamentos
    if(isset($_REQUEST['cerrar'])){
        $_SESSION['paginaEnCurso']=$_SERVER['paginaAnterior'];
        $_SESSION['paginaEnCurso']='mantenimientoDepartamento';
        header('Location: indexAplicacionFinal.php');
        exit;
    }
    
    //variable que comprueba si la entrada de los datos es correcta
    $entradaOK=true;
    
    
    //variable que almacena los errores en los campos de descripcion y volumen de negocio
    $aErrores=[
      'descDepartamento' => '',
      'volumenDeNegocio' => ''  
    ];
    
    
    //variable que almacena las respuestas de los campos de descripcion y volumen, solamente cuando se ha comprobado que son correctas
    $aRespuestas=[
      'descDepartamento' => '',
      'volumenDeNegocio' => '' 
    ];
    
    
    //si el usuario clica en confirmarEditar
    if(isset($_REQUEST['confirmarEditar'])){
      //almacenamos en el array de errores la validacion del campo descripcion en base a lo introducido en el formulario
      $aErrores['descDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['descDept'],255,0,1);
      //reemplazamos las , por los . en el campo volumen de negocio
      $volumenNegocio=str_replace(',', '.', $_REQUEST['volumenNegocio'] ?? "");

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
        //llamamos al metodo buscar por codigo en base al codigo almacenado en la sesion
        $oDepartamento=DepartamentoPDO::buscarDepartamentoPorCodigo($_SESSION['codDepartamentoEnCurso']);

        if($_REQUEST['volumenNegocio']<0){
            $_REQUEST['volumenNegocio']=0;
        }
        elseif ($_REQUEST['volumenNegocio']>10000){
            $_REQUEST['volumenNegocio']=10000;
        }
        
        //llamamos al metodo modificar departamento en base al codigo de la sesion y los nuevos valores de descripcion y volumen introducidos en el formulario
        DepartamentoPDO::modificarDepartamento($_SESSION['codDepartamentoEnCurso'], $_REQUEST['descDept'], str_replace(',', '.', $_REQUEST['volumenNegocio']));
    
        //recargamos la pagina para ver los nuevos cambios
        $_SESSION['paginaEnCurso']='modificarDepartamento';
        header('Location: indexAplicacionFinal.php');
        exit;
    }

    //llamamos de nuevo al mismo metodo para poder coger los datos del departamento modificado para mostrarlos 
    $oDepartamento=DepartamentoPDO::buscarDepartamentoPorCodigo($_SESSION['codDepartamentoEnCurso']);
    
    //creamos la variable fCreacion con el valor del metodo get que contiene la fecha de creacion del departamento
    $fCreacion=$oDepartamento->getFechaCreacionDepartamento();

    //si el departamento tiene fecha de baja
    if(!is_null($oDepartamento->getFechaBajaDepartamento())){
        //creamos una nueva variable fBaja en la que almacenamos el valor de la fecha de baja
        $fBaja=$oDepartamento->getFechaBajaDepartamento();
    }

    //declaramos un array asociativo para pasar los datos a la vista para evitar que la vista conozca al modelo
    //en ella almacenamos todos los datos del departamento para la vista
    
    $aVista=[
      'codDepartamento' => $oDepartamento->getCodDepartamento(),
      'descDepartamento' => $oDepartamento->getDescDepartamento(),
      'fechaCreacion' => $fCreacion->format('Y-m-d'),
      'volumenNegocio' => $oDepartamento->getVolumenDeNegocio(),
       //indicamos que si la variable fBaja esta creada le damos formato, si no lo está significa que el departamento aun no se ha dado de baja, por lo que será ''
      'fechaBaja' => isset($fBaja) ? $fBaja->format('Y-m-d') : ''
    ];

    //llamamos a la vista
    require_once $view['Layout'];
?>