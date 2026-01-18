<?php

    require_once './model/Rest.php';
    require_once './model/NASA.php';

            if(isset($_REQUEST["Volver"])){
        $_SESSION["paginaEnCurso"]=$_SESSION["paginaAnterior"];
        header("Location: indexAplicacionFinal.php");
        exit;
    }

    //Clase para almacenar el metodo para mostrar la foto del dia según la fecha pasada en el input
class fNasa{
    // metodo mostrarFoto que recibe una fecha que por defecto es null
    public static function mostrarFoto($fecha=null){

        // creamos la variable foto que almacenará la respuesta que hagamos a la API con la foto de la fecha especificada
        $foto=Rest::apiNasa($fecha);

        //si la variable foto contiene algo y su tipo de dato es una imagen
        if($foto && isset($foto["media_type"]) && $foto["media_type"] === "image"){
            //devolvemos un objeto de la clase NASA con el titulo y la url de la foto
            return new NASA($foto["title"], $foto["url"]);
        }
        //por defecto devolvemos null
        return null;
    }
}

$oNasa=null; //variable que almacenara la foto

//si se envia la fecha
if(isset($_REQUEST["enviar"])){
    $fecha=$_REQUEST["fecha"] ?? null; //almacenamos la fecha del input a la variable fecha, sino es null
    $oNasa = fNasa::mostrarFoto($fecha); //almacenamos la respuesta del metodo en el objeto oNasa
}
else{ //por defecto la fecha se asigna a la de hoy, mostrando asi la foto del dia de hoy
    $fecha=date("Y-m-d");
    $oNasa = fNasa::mostrarFoto($fecha);
}



    $codigocRest ='

            if(isset($_REQUEST["Volver"])){
        $_SESSION["paginaEnCurso"]=$_SESSION["paginaAnterior"];
        header("Location: indexAplicacionFinal.php");
        exit;
    }

    //Clase para almacenar el metodo para mostrar la foto del dia según la fecha pasada en el input
class fNasa{
    // metodo mostrarFoto que recibe una fecha que por defecto es null
    public static function mostrarFoto($fecha=null){

        // creamos la variable foto que almacenará la respuesta que hagamos a la API con la foto de la fecha especificada
        $foto=Rest::apiNasa($fecha);

        //si la variable foto contiene algo y su tipo de dato es una imagen
        if($foto && isset($foto["media_type"]) && $foto["media_type"] === "image"){
            //devolvemos un objeto de la clase NASA con el titulo y la url de la foto
            return new NASA($foto["title"], $foto["url"]);
        }
        //por defecto devolvemos null
        return null;
    }
}

$oNasa=null; //variable que almacenara la foto

//si se envia la fecha
if(isset($_REQUEST["enviar"])){
    $fecha=$_REQUEST["fecha"] ?? null; //almacenamos la fecha del input a la variable fecha, sino es null
    $oNasa = fNasa::mostrarFoto($fecha); //almacenamos la respuesta del metodo en el objeto oNasa
}
else{ //por defecto la fecha se asigna a la de hoy, mostrando asi la foto del dia de hoy
    $fecha=date("Y-m-d");
    $oNasa = fNasa::mostrarFoto($fecha);
}

    require_once $view["Layout"]; //llamada a la vista

    ';

        require_once $view["Layout"]; //llamada a la vista
?>