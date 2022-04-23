<?php
  $contrasena = "CscpObc4xE";
    $usuario = "epiz_31515108";
    $nombre_bd = "epiz_31515108_santi";
    $mysqli = new mysqli("sql313.epizy.com","epiz_31515108","CscpObc4xE","epiz_31515108_santi");
  
    
    try {
        $bd = new PDO (
            'mysql:host=sql313.epizy.com;
            dbname='.$nombre_bd,
            $usuario,
            $contrasena,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
    } catch (Exception $e) {
        echo "Problema con la conexion: ".$e->getMessage();
    }
?>