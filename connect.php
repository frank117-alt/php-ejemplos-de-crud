<?php

define('DB_HOST','localhost');
define('DB_NAME','prueba8' );
define('DB_PORT', '5432');      
define('DB_USER','test');
define('DB_PASS','admin123' );


try{

    $conexion = 'pgsql:host='.DB_HOST .';port='. DB_PORT . ';dbname='.DB_NAME;
    $pro = Array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    );
    $pdo = new PDO($conexion,DB_USER,DB_PASS,$pro);
    echo "conectado";
  }

    catch (Exception $error) {
        die($error->getMessage());
        }
        