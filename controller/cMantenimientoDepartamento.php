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
    $aErrores = ["descripcion" => ""]; //Array que almacena los errores en el campo descripcion

    //si pulsamos en el boton buscar
    if (isset($_REQUEST['buscar'])) {
        //variable que almacena la descripcion buscada
        // el trim es para que si no se envia ningun valor o solo hay espacios la descripcion será "".
        $descripcion = trim($_REQUEST['descripcion'] ?? "");

        //comprobamos la descripcion con la libreria de validacion de formularios
        $aErrores['descripcion']=validacionFormularios::comprobarAlfabetico($descripcion, 255, 0, 0);

        //si el array de errores contiene algo significa que la descripcion no es valida
        // por lo que la entradaOK se cambia a false
        if ($aErrores['descripcion'] != null) {
            $entradaOK = false;
        }
    }

    //si no se busca, se inicializa la descripcion a "" por defecto para mostrar todos
    else {
        $descripcion = "";
    }
    
    //array para almacenar la respuesta para la vista
    $aDepartamentosArray = [];

    //si la entrada es OK buscamos departamentos por desacripcion
    if ($entradaOK) {
        $aDepartamentos = DepartamentoPDO::buscarDepartamentoPorDescripcion($descripcion);
    } 
    
    //si no, cambiamos la descripcion a "" para limpiar busquedas anteriores
    // y buscamos de nuevo para mostrar todos
    else {
        $descripcion = "";
        $aDepartamentos = DepartamentoPDO::buscarDepartamentoPorDescripcion("");
    }
    
    //recorremos el array de departamentos y creamos un array
    // asociativo para la vista con los datos a mostrar
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
    
    //array para enviar a la vista con la descripcion, los errores si ha habido alguno y los departamentos que haya devuelto, 1 o varios
    $aVista=[
        'descripcion' => $descripcion,
        'aErrores' => $aErrores,
        'aDepartamentos' => $aDepartamentosArray  
    ];

    require_once $view['Layout']; //llamamos a la vista
?>