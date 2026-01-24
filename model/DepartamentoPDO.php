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
    }
?>