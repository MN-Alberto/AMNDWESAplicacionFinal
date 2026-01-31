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
      'descDepartamento' => '',
      'volumenDeNegocio' => ''  
    ];
    
    $aRespuestas=[
      'descDepartamento' => '',
      'volumenDeNegocio' => '' 
    ];
    
    if(isset($_REQUEST['confirmarEditar'])){
      $aErrores['descDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['descDept'],255,0,1);
      $volumenNegocio=str_replace(',', '.', $_REQUEST['volumenNegocio'] ?? "");

        foreach ($aErrores as $valorCampo => $error) {
            if ($error != null) {
                $entradaOK = false;
            }
        }

    }

    else{
      $entradaOK=false;
    }

    if($entradaOK){
        $oDepartamento=DepartamentoPDO::buscarDepartamentoPorCodigo($_SESSION['codDepartamentoEnCurso']);

        DepartamentoPDO::modificarDepartamento($_SESSION['codDepartamentoEnCurso'], $_REQUEST['descDept'], str_replace(',', '.', $_REQUEST['volumenNegocio']));
    
        $_SESSION['paginaEnCurso']='modificarDepartamento';
        header('Location: indexAplicacionFinal.php');
        exit;
    }

    $oDepartamento=DepartamentoPDO::buscarDepartamentoPorCodigo($_SESSION['codDepartamentoEnCurso']);
    
    $fCreacion=$oDepartamento->getFechaCreacionDepartamento();

    if(!is_null($oDepartamento->getFechaBajaDepartamento())){
        $fBaja=$oDepartamento->getFechaBajaDepartamento();
    }

    $aVista=[
      'codDepartamento' => $oDepartamento->getCodDepartamento(),
      'descDepartamento' => $oDepartamento->getDescDepartamento(),
      'fechaCreacion' => $fCreacion->format('Y-m-d'),
      'volumenNegocio' => $oDepartamento->getVolumenDeNegocio(),
      'fechaBaja' => isset($fBaja) ? $fBaja->format('Y-m-d') : ''
    ];

    require_once $view['Layout'];
?>