<?php
    
    /*
    * Autor: Alberto Méndez 
    * Fecha de actualización: 18/12/2025
    */

    require_once "DBPDO.php";
    require_once "Usuario.php";

    class UsuarioPDO{  
        public static function validarUsuario(string $codUsuario, string $password) {
            $query="SELECT * FROM T01_Usuario 
                WHERE T01_CodUsuario = ? 
                AND T01_Password = SHA2(?, 256)";
            
            $col = DBPDO::ejecutaConsulta($query, [$codUsuario, $password]);
 
            if(empty($col)){
                return null;
            }
            
            $fechaUltimaConexionAnterior = isset($col["T01_FechaHoraUltimaConexion"]) 
            ? new DateTime($col["T01_FechaHoraUltimaConexion"]) 
            : null;
            
            $usuario=new Usuario(
               $col["T01_CodUsuario"],
               $col["T01_Password"],
               $col["T01_DescUsuario"],
               $col["T01_NumConexiones"] + 1,
               new DateTime(),
               $col["T01_Perfil"],
               $col["T01_ImagenUsuario"],
               $fechaUltimaConexionAnterior
            );
            return $usuario;
        }
        
        public static function actualizarUltimaConexion(string $codUsuario) {
            
            $query = "UPDATE T01_Usuario
                      SET T01_NumConexiones = T01_NumConexiones + 1
                      WHERE T01_CodUsuario = ?";

            DBPDO::ejecutaConsulta($query, [$codUsuario]);
        }
        
        public static function registrarUsuario(string $codUsuario, string $descUsuario, string $password){
            
            $oUsuario = null;
        
            $query=<<<SQL
            INSERT INTO T01_Usuario (T01_CodUsuario, T01_DescUsuario,
             T01_FechaHoraUltimaConexion, T01_ImagenUsuario,  T01_NumConexiones, T01_Password, T01_Perfil) 
            VALUES 
            (:codUsuario, :descUsuario, now(), null, 0, SHA2(:password, 256), 'usuario')
            SQL;
            
            try {
            $consulta = DBPDO::ejecutaConsulta($query, [
                ':codUsuario' => $codUsuario,
                ':descUsuario' => $descUsuario,
                ':password' => $password
            ]);

            if ($consulta) {
                $oUsuario = self::validarUsuario($codUsuario, $password);
            }
        } catch (Exception $e) {
           echo $e->getMessage();
           exit;
        }

        return $oUsuario;

        }
    }
?>