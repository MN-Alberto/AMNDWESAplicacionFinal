<?php

    require_once "./model/AppError.php";

    $infoError=[
        'codError' => '',
        'descError' => '',
        'archivoError' => '',
        'lineaError' => '',
        'paginaSiguiente' => ''
    ];
    
    if(isset($_SESSION['Error'])){
        $oError=$_SESSION['Error'];
        
        $infoError=[
            'codError' => $oError->getCodError(),
            'descError' => $oError->getDescError(),
            'archivoError' => $oError->getArchivoError(),
            'lineaError' => $oError->getLineaError(),
            'paginaSiguiente' => $oError->getPaginaSiguiente()
        ];
    }
    
    if(isset($_REQUEST['Volver'])){
        $_SESSION['paginaEnCurso']=$_SESSION['paginaAnterior'];
        header('Location: indexAplicacionFinal.php');
        exit;
    }
    
    require_once $view["Layout"];
    
?>