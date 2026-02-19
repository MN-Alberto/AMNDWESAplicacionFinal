<?php

    if(!isset($_SESSION['userAMNDWESAplicacionFinal'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='inicioPublico';
        header("Location: indexAplicacionFinal.php");
        exit;
    }

    if(isset($_REQUEST['cerrar'])){
        $_SESSION['paginaEnCurso']=$_SERVER['paginaAnterior'];
        $_SESSION['paginaEnCurso']='mantenimientoDepartamento';
        header('Location: indexAplicacionFinal.php');
        exit;
    }

    //almacena si la entrada es OK
    $entradaOK=true;

    //array asociativo que almacena los errores
    $aErrores=[
        'codDepartamento' => '',
        'descDepartamento' => '',
        'fCreacion' => '',
        'volumenNegocio' => '',
        'fBaja' => ''
    ];

    //array asociativo que almacena las respuestas
    $aRespuestas=[
        'codDepartamento' => '',
        'descDepartamento' => '',
        'fCreacion' => '',
        'volumenNegocio' => '',
        'fBaja' => ''
    ];

    //si el usuario pulsa en añadir
    if(isset($_REQUEST['confirmarAñadir'])){
        //si alguno de los campos esta vacio cambiamos la entrada a false y almacenamos un error
        if(empty($_REQUEST['codDept']) || empty($_REQUEST['descDept']) || $_REQUEST['volumenNegocio'] === ""){
            $entradaOK = false;
            $aErrores['codDepartamento'] = "Todos los campos deben estar rellenados";
        }
        //si todos contienen algo validamos lo introducido, si hay error lo almacenamos en el array de errores
        else{
            $aErrores['codDepartamento']=validacionFormularios::comprobarAlfabetico($_REQUEST['codDept'], 255, 0 ,0);
            $aErrores['descDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['descDept'],255,0,1);
            $aErrores['volumenNegocio']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['volumenNegocio'],10000,0,1);

            //recorremos el array de errores
            foreach ($aErrores as $valorCampo => $error) {
                //si contiene un error
                if ($error != null) {
                    //la entradaOK cambia a falso
                    $entradaOK = false;
                }
            }
        }
    }
    //si el usuario no pulsa nada cambia a falso
    else{
      $entradaOK=false;
    }

    //si todo ha ido bien
    if($entradaOK){
    
        //guardamos la fecha actual
        $fActual=new DateTime();

        //guardamos el codigo introducido, cambiandolo a mayusculas, no queremos codigos en minusculas
        $aRespuestas['codDepartamento']=strtoupper($_REQUEST['codDept']);

        //si la llamada a buscarPorCodigo contiene algo significa que el departamento ya existe asi que almacenamos un error y cambiamos la entrada a false
        if(DepartamentoPDO::buscarDepartamentoPorCodigo($aRespuestas['codDepartamento']) != null){
            $entradaOK=false;
            $aErrores['codDepartamento']= "El departamento ya existe";
        }
        //si tras todo esto la entrada sigue ok
        if($entradaOK){

        //almacenamos el resto de respuestas
        $aRespuestas['descDepartamento']=$_REQUEST['descDept'];
        $aRespuestas['fCreacion']=$fActual;
        //si el volumen introducido es menor que 0 lo cambiamos a 0, no queremos introducir numeros negativos
        if($_REQUEST['volumenNegocio']<0){
            $aRespuestas['volumenNegocio']= 0;
        }
        $aRespuestas['volumenNegocio']= (float) $_REQUEST['volumenNegocio'];
        
        //fecha de baja por defecto la ponemos a null
        $aRespuestas['fBaja']=null;


        //llamamos a añadirDepartamento
        DepartamentoPDO::añadirDepartamento($aRespuestas['codDepartamento'], $aRespuestas['descDepartamento'], $aRespuestas['fCreacion'], $aRespuestas['volumenNegocio'], $aRespuestas['fBaja']);
    
        $_SESSION['paginaEnCurso'] = 'mantenimientoDepartamento';
        header("Location: indexAplicacionFinal.php");
        exit;
        }
    }

    //pasamos a la vista el error
    $aVista=[
        'errorCod' => $aErrores['codDepartamento'],
    ];
    
    //llamamos a la vista
    require_once $view['Layout'];

?>