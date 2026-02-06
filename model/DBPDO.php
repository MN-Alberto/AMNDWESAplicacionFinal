<?php
require_once __DIR__ . '/../config/confDB.php';
require_once 'AppError.php';

/**
 * Clase DBPDO
 *
 * Clase encargada de ejecutar consultas a la base de datos.
 *
 * @author Alberto Méndez
 * @date   2025-02-03
 */
class DBPDO {

    /**
     * Ejecuta una consulta SQL que devuelve un único registro.
     *
     * @param string $sentenciaSQL Consulta SQL
     * @param array $parametros Parámetros asociados a la consulta
     * @return mixed Devuelve un registro (array) o false si no hay resultados
     */
    public static function ejecutaConsulta(string $sentenciaSQL, array $parametros = []) {
        try {
            $miDB = new PDO(RUTA, USUARIO, PASS);

            $query = $miDB->prepare($sentenciaSQL);
            $query->execute($parametros);

            return $query->fetch();

        } catch (PDOException $e) {
            $_SESSION['Error'] = new AppError(
                $e->getCode(),
                $e->getMessage(),
                $e->getFile(),
                $e->getLine(),
                $_SESSION['paginaEnCurso']
            );

            $_SESSION["paginaAnterior"] = $_SESSION["paginaEnCurso"];
            $_SESSION["paginaEnCurso"] = "error";

            header("Location: indexAplicacionFinal.php");
            exit;
        }
    }

    /**
     * Ejecuta una consulta SQL que devuelve varios registros.
     *
     * @param string $sentenciaSQL Consulta SQL
     * @param array $parametros Parámetros asociados a la consulta
     * @return array Devuelve un array asociativo con todos los registros obtenidos de la consulta
     */
    public static function ejecutaConsultaMultiple(string $sentenciaSQL, array $parametros = []) {
        try {
            $miDB = new PDO(RUTA, USUARIO, PASS);

            $query = $miDB->prepare($sentenciaSQL);
            $query->execute($parametros);

            return $query->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            $_SESSION['Error'] = new AppError(
                $e->getCode(),
                $e->getMessage(),
                $e->getFile(),
                $e->getLine(),
                $_SESSION['paginaEnCurso']
            );

            $_SESSION["paginaAnterior"] = $_SESSION["paginaEnCurso"];
            $_SESSION["paginaEnCurso"] = "error";

            header("Location: indexAplicacionFinal.php");
            exit;
        }
    }
}
?>