<?php
    require_once "DBPDO.php";
    require_once "Usuario.php";

    /**
     * Clase UsuarioPDO
     *
     * Gestiona consultas contra la tabla T01_Usuario
     * mediante consultas a la base de datos usando DBPDO.
     *
     * @author Alberto Méndez
     * @date   2025-02-03
     */
    class UsuarioPDO{  

        /**
         * Valida un usuario por código y contraseña
         *
         * @param string $codUsuario Código del usuario a validar
         * @param string $password Contraseña del usuario a validar
         * @return Usuario|null Devuelve un objeto Usuario si es válido, null si no lo es
         */

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

        /**
         * Actualiza la fecha de última conexión y número de accesos del usuario
         *
         * @param string $codUsuario Código del usuario a actualizar
         * @return void
         */
        
        public static function actualizarUltimaConexion(string $codUsuario) {
            
            $query = "UPDATE T01_Usuario
                      SET T01_NumConexiones = T01_NumConexiones + 1
                      WHERE T01_CodUsuario = ?";

            DBPDO::ejecutaConsulta($query, [$codUsuario]);
        }

        /**
         * Registra un nuevo usuario en la base de datos.
         *
         * @param string $codUsuario Código del usuario a registrar
         * @param string $descUsuario Descripción o nombre del usuario a registrar
         * @param string $password Contraseña del usuario a registrar
         * @return Usuario|null Devuelve el objeto Usuario creado o null si da error
         */
        
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
        
        /**
         * Busca usuario por descripción
         *
         * @param string $descUsuario Texto para buscar al usuario
         * @return Usuario[] Array de objetos de tipo Usuario
         */

        public static function buscarUsuarioPorDescripcion(string $descUsuario) {

            //Si la descripcion esta vaciamostramos todos los departamentos
            if (empty($descUsuario)) {
                $query="SELECT * FROM T01_Usuario";
                $resultado=DBPDO::ejecutaConsultaMultiple($query);
            } 
            // Si la descripcion tiene algo mostramos solo los departamentos cuya descripcion
            // contenga algo de lo que introducimos en el campo de busqueda
            else {
                $query="SELECT * FROM T01_Usuario 
                          WHERE T01_DescUsuario LIKE ?";
                $resultado=DBPDO::ejecutaConsultaMultiple($query,["%$descUsuario%"]);
            }

            //Si el resultado de la consulta no contiene nada devolvemos un array vacio
            if (empty($resultado)) {
                return [];
            }


            $aUsuarios = []; //Array que contendra los departamentos

            //Por cada resultado crearemos un nuevo Departamento y lo añadiremos al array de departamentos
            foreach ($resultado as $col) {

            //Convertimos la fecha creacion a DateTime
                $fechaHoraUltimaConexion = new DateTime(
                    $col["T01_FechaHoraUltimaConexion"]
                );

                //Creamos cada departamento y lo añadimos al array que los almacena
                $aUsuarios[] = new Usuario(
                    $col["T01_CodUsuario"],
                    $col["T01_Password"],
                    $col["T01_DescUsuario"],
                    $col["T01_NumConexiones"],
                    $fechaHoraUltimaConexion,
                    $col["T01_Perfil"],
                    $col["T01_ImagenUsuario"],
                    $fechaHoraUltimaConexionAnterior ?? null
                );
            }

            //devolvemos el array con los departamentos que devuelva, pueden ser 1 o varios
            // depende de lo que haya devuelto la consulta y si filtramos por descripcion o no
            return $aUsuarios;
        }

        /**
         * Modifica la descripción de un usuario
         *
         * @param string $codUsuario Código del usuario a modificar
         * @param string $descUsuario Nueva descripción del usuario
         * @return mixed Resultado de la consulta DBPDO
         */

        //NOTA: el tipo mixed en PHPDoc significa que puede devolver diferentes tipos de valores, no tiene un tipo garantizado como int, String etc.

        public static function modificarUsuario(string $codUsuario, string $descUsuario){

            $query = "UPDATE T01_Usuario SET T01_DescUsuario = ? WHERE T01_CodUsuario = ?";

            $parametros = [$descUsuario, $codUsuario];

            return DBPDO::ejecutaConsulta($query, $parametros);
        }
        
        
        /**
         * Elimina un usuario
         *
         * @param string $codUsuario Código del usuario a eliminar
         */
        
        public static function eliminarUsuario(string $codUsuario) {
            
            $query="DELETE FROM T01_Usuario WHERE T01_CodUsuario= ?";
    
            $parametros=[$codUsuario];

            $resultado= DBPDO::ejecutaConsulta($query, $parametros);

            //si el resultado esta vacio significa que no se ha borrado nada o que algo ha ido mal
            if(!$resultado){
                return null;
            }
        }
    }
?>