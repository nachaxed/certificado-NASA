<?php
function conectarDB() :mysqli{
    $db = mysqli_connect('fdb32.awardspace.net','3936073_certificado','Facundo2021','3936073_certificado'); //modificar con el servidor
    if(!$db){
        echo "no se pudo conectar";
        exit;
    }
    return $db;
}