<?php
    class controladorUsuarios{
     function registrarUsuario(){
            if(isset($_POST['Nombre'])){
               $datos = array("nombre" => $_POST['Nombre'],
                                "apellido" => $_POST['Apellido'],
                                "email" => $_POST['Email'],
                                "dni"=> $_POST['DNI']);
                $usuarioExiste = modeloUsuarios::leerUsuario($datos['dni']); 
                    if(!isset($usuarioExiste)){
                        $respuesta = modeloUsuarios::registrarUsuario($datos);
                    }  
                echo "<script>window.open('extensiones/TCPDF/pdf/certificado.php?dni=$datos[dni]');</script>";                      
            }
        }
        public static function leerUsuario($dni){
            $respuesta = modeloUsuarios::leerUsuario($dni);
            return $respuesta;
        }
    }