<?php
    if(isset($_REQUEST['cerrar'])){
        $_SESSION['paginaEnCurso']=$_SERVER['paginaAnterior'];
        $_SESSION['paginaEnCurso']='inicioPrivado';
        header('Location: indexAplicacionFinal.php');
        exit;
    }
    
    require_once './model/Departamento.php';
    require_once './model/DepartamentoPDO.php';
    
    $entradaOK = true;
    $descripcion = "";
    $aErrores = ["descripcion" => ""];

    if (isset($_REQUEST['buscar'])) {
        $descripcion = $_REQUEST['descripcion'] ?? "";

        $aErrores['descripcion'] =
            validacionFormularios::comprobarAlfabetico($descripcion, 255, 0, 0);

        if ($aErrores['descripcion'] !== "") {
            $entradaOK = false;
        }
    }
    
    $aDepartamentosArray = [];

    if ($entradaOK) {
        $aDepartamentos =
            DepartamentoPDO::buscarDepartamentoPorDescripcion($descripcion);
    } else {
        $aDepartamentos = [];
    }
    
    foreach ($aDepartamentos as $dep) {
        $aDepartamentosArray[] = [
            'codDepartamento' => $dep->getCodDepartamento(),
            'descDepartamento' => $dep->getDescDepartamento(),
            'fechaCreacion' => $dep->getFechaCreacionDepartamento()->format('d-m-Y'),
            'volumenNegocio' => number_format($dep->getVolumenDeNegocio(), 2, ',', '.').'€',
            'fechaBaja' => $dep->getFechaBajaDepartamento() 
                           ? $dep->getFechaBajaDepartamento()->format('d-m-Y') 
                           : ''
        ];
    }
    
    $aVista=[
        'descripcion' => $descripcion,
        'aErrores' => $aErrores,
        'aDepartamentos' => $aDepartamentosArray  
    ];

    require_once $view['Layout'];
?>