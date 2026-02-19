<?php
    
    /*
     * Autor: Alberto Méndez 
     * Fecha de actualización: 16/02/2026
     * 
     */

//Comprobamos que el usuario ha pasado por el login, si no lo ha hecho volverá al inicio publico
    if(!isset($_SESSION['userAMNDWESAplicacionFinal'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='inicioPublico';
        header("Location: indexAplicacionFinal.php");
        exit;
    }

//si el usuario pulsa en el boton de volver, volvemos al mantenimiento de departamentos
    if(isset($_REQUEST['cerrar'])){
        $_SESSION['paginaEnCurso']=$_SERVER['paginaAnterior'];
        $_SESSION['paginaEnCurso']='mantenimientoDepartamento';
        header('Location: indexAplicacionFinal.php');
        exit;
    }
    
    //creamos un objeto departamento en el que almacenamos el resultado del metodo buscarDepartamentoPorCodigo pasandole el codigo de departamento en curso almacenado en la sesion
    $oDepartamento=DepartamentoPDO::buscarDepartamentoPorCodigo($_SESSION['codDepartamentoEnCurso']);
    
    //en la variable fCreacion almacenamos la llamada al get de la fecha de creacion de departamento
    $fCreacion=$oDepartamento->getFechaCreacionDepartamento();

    //si la fecha de baja del departamento no es null, es decir, contiene algun valor
    if(!is_null($oDepartamento->getFechaBajaDepartamento())){
        //le asignamos a la variable fBaja el valor del get de fecha baja de departamento
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
    
    //si el usuario clica en eliminar 
    if(isset($_REQUEST['confirmarEliminar'])){
        //llamamos al metodo eliminarDepartamento en base al codigo almacenado en la sesion
        DepartamentoPDO::eliminarDepartamento($_SESSION['codDepartamentoEnCurso']);
        
        //volvemos al mantenimiento de departamentos tras borrar para comprobar que se ha eliminado correctamente
        $_SESSION['paginaEnCurso']='mantenimientoDepartamento';
        header('Location: indexAplicacionFinal.php');
        exit;
    }
    
    //llamamos a la vista
    require_once $view['Layout'];

?>