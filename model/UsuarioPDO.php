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
            $query="INSERT INTO T01_Usuario 
                VALUES(:usuario, SHA2(:password, 256), :descripcion);";
            
            $parametros=[
              ":usuario" => $codUsuario ?? "",
              ":password" => $password ?? "",
              ":descUsuario" => $descUsuario ?? ""
            ];
            
            $insert=DBPDO::ejecutaConsulta($query, $parametros);
            
            return ($insercion && $insercion->rowCount() > 0)?true : false;
        }
    }
?>