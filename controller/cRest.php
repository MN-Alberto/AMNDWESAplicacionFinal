<?php

    require_once './model/Rest.php';
    require_once './model/NASA.php';
    require_once './model/HYPIXEL.php';

    if(isset($_REQUEST["Volver"])){
        $_SESSION["paginaAnterior"]=$_SESSION["paginaEnCurso"];
        $_SESSION["paginaEnCurso"]='inicioPrivado';
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

                // Objeto con la URL normal
                $nasaNormal = new NASA($foto["title"], $foto["url"], $foto["explanation"]);

                // Objeto con la URL HD
                $nasaHD = new NASA($foto["title"], $foto["hdurl"] ?? $foto["url"], $foto["explanation"]);

                return [
                    "normal" => $nasaNormal,
                    "hd"     => $nasaHD
                ];
                }
                //por defecto devolvemos null
                return null;
            }
        }

        $oNasa = null; //variable que almacenara la foto

        //si se envia la fecha
        if(isset($_REQUEST["enviar"])){

            $fecha=$_REQUEST["fecha"] ?? date('Y-m-d'); //almacenamos la fecha del input a la variable fecha, sino es null
            //si la fecha introducida es mayor a la fecha de hoy
            if($fecha>date('Y-m-d')){
                //inicializamos la fecha a null ya que no es una fecha valida
                $fecha=null;
            }
            //si no es mayor significa que es menor o igual, por lo tanto una fecha valida
            else{
                 $oNasa = fNasa::mostrarFoto($fecha); //almacenamos la respuesta del metodo en el objeto oNasa   

                 if ($oNasa) {
                    $_SESSION['nasa'] = [
                        'normal' => [
                            'titulo' => $oNasa['normal']->getTitulo(),
                            'foto' => $oNasa['normal']->getFoto(),
                            'descripcion' => $oNasa['normal']->getDescripcion()
                        ],
                        'hd' => [
                            'titulo' => $oNasa['hd']->getTitulo(),
                            'foto' => $oNasa['hd']->getFoto(),
                            'descripcion' => $oNasa['hd']->getDescripcion()
                        ],
                        'fecha' => $fecha
                    ];
                }
            }
        }
        else{ //por defecto si no se envia ninguna fecha, la fecha se asigna a la de hoy, mostrando asi la foto del dia
            $fecha=date("Y-m-d");
            $oNasa = fNasa::mostrarFoto($fecha);
        }

        if(isset($_REQUEST['detalleFoto'])){
                $_SESSION["paginaEnCurso"]='detalleFoto';
                header("Location: indexAplicacionFinal.php");
                exit;
        }
        
        
        if($oNasa){
          $aVista=[
          "titulo" => $oNasa['normal']->getTitulo(),
          "foto" => $oNasa['normal']->getFoto(),
          "fotoHD" => $oNasa['hd']->getFoto(),
          "fecha" => $fecha,
          "descripcion" => $oNasa['normal']->getDescripcion()
        ];   
        }
        
        else{
            $oNasa=null;
        }
        
        class datosServidor{
            public static function mostrarDatos() {
                $datos= Rest::apiServerInfo();
                
                
                if($datos){
                    $respuestaServidor = new HYPIXEL(
                            $datos['ip'] ?? 'Desconocida',             
                            $datos['online'] ?? false,                   
                            $datos['players']['online'] ?? 0,                 
                            $datos['players']['max'] ?? 0,             
                            $datos['version'] ?? 'Desconocida', 
                            $datos['icon'] ?? null);
                    return $respuestaServidor;
                }
                
                return null; 
            }
        }
        
        $oDatos=null;
        
        $oDatos= datosServidor::mostrarDatos();
        
        if($oDatos){
            $_SESSION['hypixel']=[
              'ip' => $oDatos->getIp(),
              'online' => $oDatos->getOnline(),
              'numJugadores' => $oDatos->getNumJugadoresActuales(),
              'numJugadoresMaximos' => $oDatos->getNumJugadoresMaximos(),
              'version' => $oDatos->getVersion(),
              'icono' => $oDatos->getIcono()
            ];
        }
        
        if($oDatos){
            $aVistaDatos=[
              'ip' => $oDatos->getIp(),
              'online' => $oDatos->getOnline(),
              'numJugadores' => $oDatos->getNumJugadoresActuales(),
              'numJugadoresMaximos' => $oDatos->getNumJugadoresMaximos(),
              'version' => $oDatos->getVersion(),
              'icono' => $oDatos->getIcono()
            ];
        }
        else {
            $oDatos=null;
        }

        require_once $view["Layout"]; //llamada a la vista
?>