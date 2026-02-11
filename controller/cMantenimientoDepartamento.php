<?php

    if(!isset($_SESSION['userAMNDWESAplicacionFinal'])){
        $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='inicioPublico';
        header("Location: indexAplicacionFinal.php");
        exit;
    }

    if(isset($_REQUEST['cerrar'])){
        $_SESSION['paginaEnCurso']=$_SERVER['paginaAnterior'];
        $_SESSION['paginaEnCurso']='inicioPrivado';
        header('Location: indexAplicacionFinal.php');
        exit;
    }
    
    if(isset($_REQUEST['añadir'])){
        $_SESSION['paginaEnCurso']=$_SERVER['paginaAnterior'];
        $_SESSION['paginaEnCurso']='altaDepartamento';
        header('Location: indexAplicacionFinal.php');
        exit;
    }
    
    if(isset($_REQUEST['editarDept'])){
        $_SESSION['codDepartamentoEnCurso'] = $_REQUEST['editarDept'];
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'modificarDepartamento';
        header('Location: indexAplicacionFinal.php');
        exit;
    }
    
    if(isset($_REQUEST['verDept'])){
        $_SESSION['codDepartamentoEnCurso'] = $_REQUEST['verDept'];
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'verDepartamento';
        header('Location: indexAplicacionFinal.php');
        exit;
    }

    if(isset($_REQUEST['bajaLogica'])){
        $_SESSION['codDepartamentoEnCurso'] = $_REQUEST['bajaLogica'];
        DepartamentoPDO::bajaLogica($_SESSION['codDepartamentoEnCurso']);
        header('Location: indexAplicacionFinal.php');
        exit;
    }

    if(isset($_REQUEST['reactivarBaja'])){
        $_SESSION['codDepartamentoEnCurso'] = $_REQUEST['reactivarBaja'];
        DepartamentoPDO::reactivarBaja($_SESSION['codDepartamentoEnCurso']);
        header('Location: indexAplicacionFinal.php');
        exit;
    }

    if(isset($_REQUEST['eliminarDept'])){
        $_SESSION['codDepartamentoEnCurso'] = $_REQUEST['eliminarDept'];
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'eliminarDepartamento';
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
        $estado = $_REQUEST['estado'] ?? "Activo";
        
        //se almacena en la sesion la descripcion buscada para volver a ponerla cuando volvamos a entrar al mantenimiento
        $_SESSION['buscado']=$_REQUEST['descripcion'];
        $_SESSION['estadoBuscado'] = $_REQUEST['estado'];

        //comprobamos la descripcion con la libreria de validacion de formularios
        $aErrores['descripcion']=validacionFormularios::comprobarAlfabetico($descripcion, 255, 0, 0);

        //si el array de errores contiene algo significa que la descripcion no es valida
        // por lo que la entradaOK se cambia a false
        if ($aErrores['descripcion'] != null) {
            $entradaOK = false;
        }
    }

    //si no se busca
    else {
        //si existe en la sesion la descripcion buscada
            if(isset($_SESSION['buscado']) || isset($_SESSION['estadoBuscado'])){
                //inicializamos la descripcion al valor que se busco anteriormente
                $descripcion=$_SESSION['buscado'];
                $estado=$_SESSION['estadoBuscado'];
            }
            //si no existe, significa que no hay nada buscado anteriormente o ha sido borrado
            else{
                //inicializamos a "" para asi mostrar todos los departamentos
                $descripcion = "";
                $estado="Activo";
            }
    }
    
    //array para almacenar la respuesta para la vista
    $aDepartamentosArray = [];

    //si la entrada es OK buscamos departamentos por desacripcion
    if ($entradaOK) {
        //$aDepartamentos = DepartamentoPDO::buscarDepartamentoPorDescripcion($descripcion);
        $aDepartamentos = DepartamentoPDO::buscarDepartamentoPorDescripcionYEstado($descripcion, $estado);
    } 
    
    //si no, cambiamos la descripcion a "" para limpiar busquedas anteriores
    // y buscamos de nuevo para mostrar todos
    else {
        $descripcion = "";
        $estado="Activo";
        //$aDepartamentos = DepartamentoPDO::buscarDepartamentoPorDescripcion($descripcion);
        $aDepartamentos = DepartamentoPDO::buscarDepartamentoPorDescripcionYEstado($descripcion, $estado);
    }
    
    //recorremos el array de departamentos y creamos un array
    // asociativo para la vista con los datos a mostrar
    foreach ($aDepartamentos as $dep) {
        $aDepartamentosArray[] = [
            'codDepartamento' => $dep->getCodDepartamento(),
            'descDepartamento' => $dep->getDescDepartamento(),
            'fechaCreacion' => $dep->getFechaCreacionDepartamento()->format('d-m-Y H:i:s'),
            'volumenNegocio' => number_format($dep->getVolumenDeNegocio(), 2, ',', '.').'€',
            'fechaBaja' => $dep->getFechaBajaDepartamento() 
                           ? $dep->getFechaBajaDepartamento()->format('d-m-Y H:i:s') 
                           : ''
        ];
    }
    
    //array para enviar a la vista con la descripcion, los errores si ha habido alguno y los departamentos que haya devuelto, 1 o varios
    $aVista=[
        'descripcion' => $descripcion,
        'aErrores' => $aErrores,
        'estado' => $estado,
        'aDepartamentos' => $aDepartamentosArray
    ];

    require_once $view['Layout']; //llamamos a la vista
?>