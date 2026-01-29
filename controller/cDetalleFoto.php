<?php
    if(isset($_REQUEST['Volver'])){
        $_SESSION["paginaEnCurso"]='rest';
        header("Location: indexAplicacionFinal.php");
        exit;
    }
    
    
    $oNasa = null;
    $aVista = null;

    if (isset($_SESSION['nasa'])) {
        $oNasa = $_SESSION['nasa'];
        $aVista = [
            "titulo" => $oNasa['normal']['titulo'],
            "foto" => $oNasa['normal']['foto'],
            "fotoHD" => $oNasa['hd']['foto'],
            "fecha" => $oNasa['fecha'],
            "descripcion" => $oNasa['normal']['descripcion']
        ];
    }

    require_once $view["Layout"];
?>