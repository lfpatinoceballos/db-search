<?php
    $cliente = $_REQUEST ["cliente"];
    $pasaje = $_REQUEST ["pasaje"];
    $Fecha_compra = $_REQUEST ["Fecha_compra"];
    $Fecha_salida = $_REQUEST ["Fecha_salida"];

    //1.conectar a la base de datos
    $host = "localhost";
    $dbname = "aeropueto_db_2021_1";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //2.preparar la sentencia SQL
    $sql ="INSERT INTO itinerario (Id_Itinerario, Id_Cliente, Id_Pasaje, Fecha_compra, Fecha_salida) VALUES (NULL, '$cliente', '$pasaje', '$Fecha_compra', '$Fecha_salida')";
    //3. prepara SQL sentencia
    $q = $cnx->prepare($sql);
    //4. Ejecuto SQL sentencia
    $result = $q->execute();

    if($result){
        echo "El itinerario se ha guardado";
    }
    else{
        echo "El itinerario no se guardo $Cliente";
    }
?>