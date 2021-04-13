<?php
    $cliente = $_REQUEST ["cliente"];
    $ciudadOrigen = $_REQUEST ["vuelo"];
    $ciudadDestino = $_REQUEST ["vuelodestino"];

    //1.conectar a la base de datos
    $host = "localhost";
    $dbname = "aeropueto_db_2021_1";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //2.preparar la sentencia SQL
    $sql ="INSERT INTO destino (Id_Destino, Cliente, ciudadOrigen, ciudadDestino) VALUES (NULL, '$cliente', '$ciudadOrigen', '$ciudadDestino')";
    //3. prepara SQL sentencia
    $q = $cnx->prepare($sql);
    //4. Ejecuto SQL sentencia
    $result = $q->execute();

    if($result){
        echo "El destino se ha guardado";
    }
    else{
        echo "El destino no se guardo $ciudadOrigen";
    }
?>