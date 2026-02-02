<?php
    //buscarDepartamentoPorDescripcion

    require_once "DBPDO.php";
    require_once "Departamento.php";
    
    class DepartamentoPDO{
    public static function buscarDepartamentoPorDescripcion(string $descDepartamento) {

    //Si la descripcion esta vaciamostramos todos los departamentos
        if (empty($descDepartamento)) {
            $query="SELECT * FROM T02_Departamento";
            $resultado=DBPDO::ejecutaConsultaMultiple($query);
        } 
        // Si la descripcion tiene algo mostramos solo los departamentos cuya descripcion
        // contenga algo de lo que introducimos en el campo de busqueda
        else {
            $query="SELECT * FROM T02_Departamento 
                      WHERE T02_DescDepartamento LIKE ?";
            $resultado=DBPDO::ejecutaConsultaMultiple($query,["%$descDepartamento%"]);
        }

        //Si el resultado de la consulta no contiene nada devolvemos un array vacio
        if (empty($resultado)) {
            return [];
        }


        $aDepartamentos = []; //Array que contendra los departamentos

        //Por cada resultado crearemos un nuevo Departamento y lo añadiremos al array de departamentos
        foreach ($resultado as $col) {

        //Convertimos la fecha creacion a DateTime
            $fechaCreacion = new DateTime(
                $col["T02_FechaCreacionDepartamento"]
            );

            //Si el campo de fechaBaja contiene algo lo convertimos a DateTime, si no contiene nada inicializamos a null
            $fechaBaja = !is_null($col["T02_FechaBajaDepartamento"])
                ? new DateTime($col["T02_FechaBajaDepartamento"])
                : null;

            //Creamos cada departamento y lo añadimos al array que los almacena
            $aDepartamentos[] = new Departamento(
                $col["T02_CodDepartamento"],
                $col["T02_DescDepartamento"],
                $fechaCreacion,
                (float) $col["T02_VolumenDeNegocio"],
                $fechaBaja
            );
        }

        //devolvemos el array con los departamentos que devuelva, pueden ser 1 o varios
        // depende de lo que haya devuelto la consulta y si filtramos por descripcion o no
        return $aDepartamentos;
    }

    public static function buscarDepartamentoPorCodigo(string $codDepartamento){
        //realizamos una consulta a la base de datos en la que cogemos el depratamento en base al codigo que le pasemos
        $query="SELECT * FROM T02_Departamento WHERE T02_CodDepartamento like ?";

        //almacenamos la ejecucion de la consulta en base al query y a los parametros en la variable resultado
        $resultado=DBPDO::ejecutaConsulta($query,["%$codDepartamento%"]);

        //si resultado no contiene nada significa que no existe nigun departamento con ese codigo o ha habido algun error
        if (!$resultado) {
            return null;
        }

        //si contiene algo, devolvemos un objeto departamento con los campos del resultado, cambiando los campos fecha a dateTime y el campo baja tenemos en cuenta que puede ser null
        return new Departamento(
            $resultado['T02_CodDepartamento'],
            $resultado['T02_DescDepartamento'],
            new DateTime($resultado['T02_FechaCreacionDepartamento']),
            $resultado['T02_VolumenDeNegocio'],
                $resultado['T02_FechaBajaDepartamento'] !== null 
                ? new DateTime($resultado['T02_FechaBajaDepartamento']) 
                : null
        );

    }

    public static function modificarDepartamento(string $codDepartamento, string $descDepartamento, float $volumenNegocio){
        
        //este query actualiza la descripcion y el volumen de negocio del departamento que le indiquemos en el codigo de departamento
        $query="UPDATE T02_Departamento SET T02_DescDepartamento=:descDepartamento,
                T02_VolumenDeNegocio=:volumenNegocio WHERE T02_CodDepartamento=:codDepartamento";

        //creamos un array asociativo para almacenar los diferentes campos para la consulta
        $parametros=[
            'descDepartamento' => $descDepartamento,
            'volumenNegocio' => $volumenNegocio,
            'codDepartamento' => $codDepartamento
        ];
        
        //ejecutamos la consulta con los parametros indicados

        DBPDO::ejecutaConsulta($query, $parametros);
    }
    
    public static function eliminarDepartamento(string $codDepartamento){
        
        //esta consulta borra el usuario al que le corresponda el codigo que le hemos indicado
        $query="DELETE FROM T02_Departamento WHERE T02_CodDepartamento= ?";
        
        //le asignamos un array indexado con el valor del codigo de departamento a los parametros
        $parametros=[$codDepartamento];
        
        //ejecutamos la consulta y lo almacenamos en resultado
        $resultado= DBPDO::ejecutaConsulta($query, $parametros);
        
        //si el resultado esta vacio significa que no se ha borrado nada o que algo ha ido mal
            if(!$resultado){
                return null;
            }
        }
    }
?>