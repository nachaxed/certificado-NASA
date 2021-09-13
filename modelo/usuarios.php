<?php
    require_once 'database.php';
    class modeloUsuarios {
    public static function registrarUsuario ($datos){
            $db = conectarDB();
            $sql = "INSERT INTO usuarios VALUE(null,'$datos[nombre]','$datos[apellido]','$datos[email]', '$datos[dni]')";
            $query = mysqli_query($db, $sql);
            // var_dump($db->error);
            return $query;
         
        }
        public static function leerUsuario ($dni){
            $db = conectarDB();
            $sql = "SELECT * FROM usuarios WHERE dni = $dni";
            $query = mysqli_query($db, $sql);
            var_dump($db->error);
            return $query->fetch_assoc();
        }
    }