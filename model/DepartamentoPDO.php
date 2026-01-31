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
        $query="SELECT * FROM T02_Departamento WHERE T02_CodDepartamento like ?";

        $resultado=DBPDO::ejecutaConsulta($query,["%$codDepartamento%"]);

        if (!$resultado) {
            return null;
        }

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
        $query="UPDATE T02_Departamento SET T02_DescDepartamento=:descDepartamento,
                T02_VolumenDeNegocio=:volumenNegocio WHERE T02_CodDepartamento=:codDepartamento";

        $parametros=[
            'descDepartamento' => $descDepartamento,
            'volumenNegocio' => $volumenNegocio,
            'codDepartamento' => $codDepartamento
        ];

        DBPDO::ejecutaConsulta($query, $parametros);
    }
    }
?>