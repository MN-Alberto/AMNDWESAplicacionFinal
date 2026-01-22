<?php
    
    if(isset($_REQUEST['cerrar'])){
        $_SESSION["paginaEnCurso"]=$_SESSION['paginaAnterior'];
        header("Location: indexAplicacionFinal.php");
        exit;
    }

    $descripcion=$_SESSION['userAMNDWESAplicacionFinal']->getDescUsuario();
    $nomUsuario=$_SESSION['userAMNDWESAplicacionFinal']->getCodUsuario();
    $nConexiones=$_SESSION['userAMNDWESAplicacionFinal']->getNumConexiones();
    $ultimaConexion=$_SESSION['userAMNDWESAplicacionFinal']->getFechaHoraUltimaConexion()->format('d/m/Y H:i:s');
    $ultimaConexionAnterior=$_SESSION['userAMNDWESAplicacionFinal']->getFechaHoraUltimaConexionAnterior()->format('d/m/Y H:i:s');
    
    require_once $view['Layout'];
?>