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

    $entradaOK=true;

    $aErrores=[
        'codDepartamento' => '',
        'descDepartamento' => '',
        'fCreacion' => '',
        'volumenNegocio' => '',
        'fBaja' => ''
    ];

    $aRespuestas=[
        'codDepartamento' => '',
        'descDepartamento' => '',
        'fCreacion' => '',
        'volumenNegocio' => '',
        'fBaja' => ''
    ];

    if(isset($_REQUEST['confirmarAñadir'])){

        if(empty($_REQUEST['codDept']) || empty($_REQUEST['descDept']) || $_REQUEST['volumenNegocio'] === ""){
            $entradaOK = false;
            $aErrores['codDepartamento'] = "Todos los campos deben estar rellenados";
        }
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
    else{
      $entradaOK=false;
    }

    if($entradaOK){
    
        $fActual=new DateTime();

        $aRespuestas['codDepartamento']=strtoupper($_REQUEST['codDept']);

        if(DepartamentoPDO::buscarDepartamentoPorCodigo($aRespuestas['codDepartamento']) != null){
            $entradaOK=false;
            $aErrores['codDepartamento']= "El departamento ya existe";
        }
        if($entradaOK){

        $aRespuestas['descDepartamento']=$_REQUEST['descDept'];
        $aRespuestas['fCreacion']=$fActual;
        if($_REQUEST['volumenNegocio']<0){
            $aRespuestas['volumenNegocio']= 0;
        }
        $aRespuestas['volumenNegocio']= (float) $_REQUEST['volumenNegocio'];
        $aRespuestas['fBaja']=null;


        DepartamentoPDO::añadirDepartamento($aRespuestas['codDepartamento'], $aRespuestas['descDepartamento'], $aRespuestas['fCreacion'], $aRespuestas['volumenNegocio'], $aRespuestas['fBaja']);
    
        $_SESSION['paginaEnCurso'] = 'mantenimientoDepartamento';
        header("Location: indexAplicacionFinal.php");
        exit;
        }
    }

    $aVista=[
        'errorCod' => $aErrores['codDepartamento'],
    ];
    
    require_once $view['Layout'];

?>