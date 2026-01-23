<?php
    //buscarDepartamentoPorDescripcion

    require_once "DBPDO.php";
    require_once "Departamento.php";
    
    class DepartamentoPDO{
        public static function buscarDepartamentoPorDescripcion(string $descDepartamento){
            
        if (empty($descDepartamento)) {
            $query = "SELECT * FROM T02_Departamento";
            $col = DBPDO::ejecutaConsulta($query); // fetch() devuelve solo 1 fila
        } else {
            $query = "SELECT * FROM T02_Departamento WHERE T02_DescDepartamento LIKE ?";
            $col = DBPDO::ejecutaConsulta($query, ["%$descDepartamento%"]); // fetch() devuelve 1 fila
        }

        // Si no hay fila, devolvemos array vacío
        if (!$col) {
            return [];
        }

        // Convertimos la fila en objeto Departamento
        $fechaCreacion = new DateTime($col["T02_FechaCreacionDepartamento"]);
        $fechaBaja = !is_null($col["T02_FechaBajaDepartamento"]) ? new DateTime($col["T02_FechaBajaDepartamento"]) : null;

        $departamento = new Departamento(
            $col["T02_CodDepartamento"],
            $col["T02_DescDepartamento"],
            $fechaCreacion,
            (float)$col["T02_VolumenDeNegocio"],
            $fechaBaja
        );

        // Siempre devolvemos un array con 1 objeto (o vacío si no hay datos)
        return [$departamento]; 
        }
    }
?>