<?php

/**
 * Clase Rest
 *
 * Gestiona llamadas a APIs externas, en este caso a la API de la NASA.
 *
 * @author Alberto Méndez
 * @date   2025-02-03
 */
class Rest {
    /**
     * @var string Clave de la API de la NASA
     */
    const apiKeyNasa = 'ocZPxdxEeLa7ANfRXEkYm3CvfJka3TJuIg9BAbMc'; //token para llamar a la API de la nasa
    // OPCIÓN DE DESARROLLO CON file_get_contents
    // public static function apiNasa($fecha = null) {
    //     $url = 'https://api.nasa.gov/planetary/apod?api_key=' . self::apiKeyNasa; //url de la foto del dia concatenado con la key que solicitamos en la página de la nasa

    //     //si se recibe una fecha válida se añade como parámetro a la URL
    //     if ($fecha) {
    //         $url .= '&date=' . $fecha;
    //     }

    //     //realiza la petición HTTP y obtiene la respuesta en formato JSON
    //     $respuesta = file_get_contents($url);

    //     //si la petición falla, devuelve null
    //     if ($respuesta === false) {
    //         return null;
    //     }

    //     //convierte el JSON recibido en un array y lo devuelve
    //     return json_decode($respuesta, true);
    // }


    // OPCIÓN DE EXPLOTACIÓN CON cURL

    /**
     * Obtiene información de la NASA para un día específico o el día actual dependiendo de si se le pasa una fecha o no
     *
     * @param string|null $fecha Fecha en formato YYYY-MM-DD, opcional, si no se le pasa nada será la del día de hoy
     * @return array|null Devuelve un array con los datos de la API o null si da error
     */
    public static function apiNasa($fecha = null) {
        //construimos la URL base de la API con la clave que obtuvimos de la NASA
        $url = 'https://api.nasa.gov/planetary/apod?api_key=' . self::apiKeyNasa;

        //si se pasa una fecha, la añadimos como parámetro para conseguir la foto de ese día
        if ($fecha) {
            $url .= '&date=' . $fecha;
        }

        //inicializamos cURL con la URL
        $ch = curl_init($url);

        //configuramos cURL para devolver el resultado como string en lugar de imprimirlo
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //desactivamos la verificación del certificado SSL
        //por si nuestro servidor de explotación no reconoce el certificado
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        //ejecutamos y almacenamos la respuesta
        $respuesta = curl_exec($ch);

        //si la petición falla devolvemos null
        if ($respuesta === false) {
            curl_close($ch);
            return null;
        }

        //cerramos la sesión de cURL
        curl_close($ch);

        //decodificamos el JSON recibido en un array asociativo
        $datos = json_decode($respuesta, true);

        //si la respuesta no es un array válido o contiene un error, devolvemos null
        if (!is_array($datos) || isset($datos['error'])) {
            return null;
        }

        //devolvemos los datos obtenidos de la petición a la API
        return $datos;
    }
    
    
    /**
     * Obtiene información de un servidor de Minecraft concreto
     *
     * @return array|null Devuelve un array con los datos de la API o null si da error
     */
    public static function apiServerInfo($ip){
        //$url='https://api.mcsrvstat.us/2/play.hypixel.net';
        //$url='https://api.mcsrvstat.us/2/play.cubecraft.net';
        //$url='https://api.mcsrvstat.us/2/mcs.gg';

        $url = "https://api.mcsrvstat.us/2/" . $ip;
        
        $ch = curl_init($url);
        
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36');
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        
        $respuesta = curl_exec($ch);
        
        if ($respuesta === false) {
            curl_close($ch);
            return null;
        }
        
        curl_close($ch);
        
        $datos = json_decode($respuesta, true);
        
        if (!is_array($datos) || isset($datos['error'])) {
            return null;
        }
        
        return $datos;
    }


/**
 * Obtiene un número aleatorio en base a dos números pasados como parametro
 *
 * @return array Devuelve un array con los datos de la API
 */
    public static function obtenerNumeroAleatorio($inicio, $fin) {
        //array que va a almacenar los datos del numero
        $resultadoNumero = [
            'numero' => null,
            'error' => null,
            'inicio' => $inicio,
            'fin' => $fin
        ];

        //si los datos introducidos en los numeros inicial o final no son numeros devolvemos un error
        if (!is_numeric($inicio) || !is_numeric($fin)) {
            $resultadoNumero['error'] = "Debes introducir números";
            return $resultadoNumero;
        }

        //url de la api que genera el numero
        $url = "https://daw207.local.ieslossauces.es/AMNDWESAplicacionFinal/api/wsNumeroAleatorio.php?inicio={$inicio}&fin={$fin}";
        //inicializamos curl
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //tiempo de espera de 10 segundos
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        //quitamos verificacion del certificado
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        //ejecutamos culr y almacenamos la respuesta en la variable
        $respuesta = curl_exec($ch);

        //si la respuesta es falsa no se ha podido conectar a la api
        if ($respuesta === false) {
            $resultadoNumero['error'] = "No se pudo conectar a la API: " . curl_error($ch);
            curl_close($ch);
            return $resultadoNumero;
        }

        //si si a podido cerramos curl
        curl_close($ch);

        //decodificamos la respuesta json a un array
        $data = json_decode($respuesta, true);

        //si la api devolvio un error
        if(isset($data['error'])){
            //lo guardamos para mostrarlo
            $resultadoNumero['error'] = $data['error'];
        } else {
            //si no ha habido error guardamos el numero generado junto con los numeros de inicio y fin dados como parametro
            $resultadoNumero['numero'] = $data['numeroAleatorio'];
            $resultadoNumero['inicio'] = $data['inicio'];
            $resultadoNumero['fin'] = $data['fin'];
        }

        //devolvemos el array
        return $resultadoNumero;
    }

}
?>