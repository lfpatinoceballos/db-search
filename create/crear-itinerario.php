<?php
    //1.conectar a la base de datos
    $host = "localhost";
    $dbname = "aeropueto_db_2021_1";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //2.preparar la sentencia SQL
    $sql ="SELECT Id_cliente, Nombre FROM cliente";
     //3. prepara SQL sentencia
     $q = $cnx->prepare($sql);
     //4. Ejecuto SQL sentencia
    $result = $q->execute();
    $cliente = $q->fetchAll();

    //2.preparar la sentencia SQL
    $sql ="SELECT Id_Pasaje, Clase FROM pasaje";
     //3. prepara SQL sentencia
     $q = $cnx->prepare($sql);
     //4. Ejecuto SQL sentencia
    $result = $q->execute();
    $pasajes = $q->fetchAll();

?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear itinerario</title>
</head>
<body>
    <form action="guardar-itinerario.php" method="POST">
        Cliente <select name="cliente" id=""> <br>
<?php
    for($i=0; $i<count($cliente); $i++){
?>
        <option value="<?php echo $cliente[$i]["Id_cliente"] ?>">
        <?php echo $cliente[$i]["Nombre"]?>
    </option>
<?php
    } 
?>
        </select> <br> <br>
        Pasaje <select name="pasaje" id=""> <br>
<?php
    for($i=0; $i<count($pasajes); $i++){
?>
        <option value="<?php echo $pasajes[$i]["Id_Pasaje"] ?>">
        <?php echo $pasajes[$i]["Clase"]?></option>
<?php
    }
?>
        </select> <br> <br>
Fecha_compra    <input type="date" name= "Fecha_compra"> <br/> <br>
Fecha_salida    <input type="date" name= "Fecha_salida"> <br/> <br>
                <input type="submit" value="guardar itinerario">
   </form>
</body>
</html>