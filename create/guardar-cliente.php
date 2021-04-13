<?php
    $nombre = $_REQUEST ["nombre"];
    $edad = $_REQUEST ["edad"];
    $telefono = $_REQUEST ["telefono"];
    $correo = $_REQUEST ["correo"];

    //1.conectar a la base de datos
    $host = "localhost";
    $dbname = "aeropueto_db_2021_1";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //2.preparar la sentencia SQL
    $sql ="INSERT INTO cliente (Id_cliente, Nombre, Edad, Telefono, Correo) VALUES (NULL, '$nombre', '$edad', '$telefono', '$correo')";
    //3. prepara SQL sentencia
    $q = $cnx->prepare($sql);
    //4. Ejecuto SQL sentencia
    $result = $q->execute();
    
    if($result){
        echo "El cliente se ha guardado";
    }
    else{
        echo "El cliente no se guardo $nombre";
    }
?>
!