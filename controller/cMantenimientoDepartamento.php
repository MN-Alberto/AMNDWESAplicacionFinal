<?php

    /*
     * Autor: Alberto Méndez 
     * Fecha de actualización: 16/02/2026
     * 
     */

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

    if(isset($_REQUEST['exportar'])){
        //almacenamos en el array los departamentos que ha buscado el usuario
        $aDepartamentos = DepartamentoPDO::buscarDepartamentoPorDescripcionYEstado($_SESSION['buscado'], $_SESSION['estadoBuscado']);

        //array para almacenar todos los departamentos
        $aArchivoDepartamentos = [];

        //si hay departamentos
        if(!is_null($aDepartamentos) && is_array($aDepartamentos)){
            //recorremos cada departamento
            foreach($aDepartamentos as $dept){
                //y lo almacenamos el el array del archivo para que contenga todos los departamentos buscados
                $aArchivoDepartamentos[] = [
                    'codDepartamento' => $dept->getCodDepartamento(),
                    'descDepartamento' => $dept->getDescDepartamento(),
                    'fechaCreacionDepartamento' => $dept->getFechaCreacionDepartamento(),
                    'volumenNegocio' => $dept->getVolumenDeNegocio(),
                    'fechaBajaDepartamento' => $dept->getFechaBajaDepartamento()
                ];
            }
        }

        //convertimos el array a json con los departamentos buscados con formato legible
        $archivo = json_encode($aArchivoDepartamentos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        
        //indicamos que es un json descargable
        header('Content-Type: application/json');

        //le indicamos el nombre del archivo
        header('Content-Disposition: attachment; filename="departamentosExportados.json"');

        //mandamos el contenido al navegador
        echo $archivo;
        exit;
    }

    //variable para almacenar la serpuesta si la insercion es correcta
    $insercionCorrecta=null;

    if(isset($_REQUEST['importarDptos'])){
        //variable para la entradaOK del archivo
        $archivoOk = true;

        //almacena los errores del archivo a importar
        $aErrores['archivoDptos'] = null;

        //cogemos el nombre del archivo
        $nombreArchivo = $_FILES['archivoDptos']['name'] ?? '';

        //la extension del archivo tiene que ser json
        $aExtensiones = ['json'];

        //validamos el nombre del archivo con la extension json
        $aErrores['archivoDptos'] = validacionFormularios::validarNombreArchivo($nombreArchivo, $aExtensiones, 150, 4, 0);

        //si hay errores la entradaOK del archivo será falsa
        if(!empty($aErrores['archivoDptos'])){
            $archivoOk = false;
        }

        //comprobamos si no se ha seleccionado un archivo
        if($_FILES['archivoDptos']['error'] === UPLOAD_ERR_NO_FILE){
            $aErrores['archivoDptos'] = "Por favor seleccione un archivo a importar";
            $archivoOk = false;
        }

        //si el archivo se ha subido correctamente lo procesamos
        if($archivoOk && $_FILES['archivoDptos']['error'] === UPLOAD_ERR_OK){
            //leemos el contenido del archivo json
            $contenidoArchivo = file_get_contents($_FILES['archivoDptos']['tmp_name']);

            //convertimos el json a un array
            $aDptos = json_decode($contenidoArchivo, true);

            //campos que deben tener cada departamento para que sea valido
            $aCamposObligatorios = [
                'codDepartamento',
                'descDepartamento',
                'fechaCreacionDepartamento',
                'volumenNegocio',
                'fechaBajaDepartamento'
            ];

    
            //verificamos que cada departamento tenga todos los campos obligatorios y si falta alguno marcamos el archivo como incorrecto y mostramos un error
            foreach($aDptos as $indice => $oDepartamento){
                foreach($aCamposObligatorios as $campo){
                    if(!array_key_exists($campo, $oDepartamento)){
                        $archivoOk = false;
                        $aErrores['archivoDptos'] = "Error en el registro $indice: falta el campo $campo";
                        break 2; //con esto salimos de los dos bucles de golpe
                    }
                }
            }

            //si el archivo es correcto insertamos los departamentos en la base de datos y inicializamos el mensaje
            if($archivoOk){
                DepartamentoPDO::insertarDepartamentos($aDptos);
                $insercionCorrecta = "La inserción de departamentos se ha realizado correctamente";
            }
        }
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