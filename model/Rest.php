<?php

class Rest {
    const apiKeyNasa = 'ocZPxdxEeLa7ANfRXEkYm3CvfJka3TJuIg9BAbMc'; //token para llamar a la API de la nasa

    public static function apiNasa($fecha = null) {
        $url = 'https://api.nasa.gov/planetary/apod?api_key=' . self::apiKeyNasa; //url de la foto del dia concatenado con la key que solicitamos en la página de la nasa

        //si se recibe una fecha válida se añade como parámetro a la URL
        if ($fecha) {
            $url .= '&date=' . $fecha;
        }

        //realiza la petición HTTP y obtiene la respuesta en formato JSON
        $respuesta = file_get_contents($url);

        //si la petición falla, devuelve null
        if ($respuesta === false) {
            return null;
        }

        //convierte el JSON recibido en un array y lo devuelve
        return json_decode($respuesta, true);
    }
}
?>