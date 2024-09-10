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

    $sql = file_get_contents("sintesis.sql");
     if($sql==false){
        throw new Exception('error en la prueba');
     }

     $pdo->exec($sql);
     echo "base de datos creada con las tablas";

}
catch( PDOException $error ){
    echo("error 1 " . $error->getMessage());

}
catch (Exception $error) {
die($error->getMessage());
}
