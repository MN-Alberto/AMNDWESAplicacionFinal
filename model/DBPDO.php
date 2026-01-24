<?php

/*
 * Autor: Alberto Méndez 
 * Fecha de actualización: 18/12/2025
 * 
 */

    require_once "./config/confDB.php";
    require_once 'AppError.php';

    class DBPDO {
        public static function ejecutaConsulta(string $sentenciaSQL, array $parametros = []) {
            try {
                $miDB=new PDO(RUTA, USUARIO, PASS);

                $query=$miDB->prepare($sentenciaSQL);

                $query->execute($parametros);

                return $query->fetch();
                
        } catch (PDOException $e){
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