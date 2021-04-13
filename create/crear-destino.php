<?php
    //1.conectar a la base de datos
    $host = "localhost";
    $dbname = "aeropueto_db_2021_1";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //2.preparar la sentencia SQL
    $sql ="SELECT Nombre, Nombre FROM cliente";
     //3. prepara SQL sentencia
     $q = $cnx->prepare($sql);
     //4. Ejecuto SQL sentencia
    $result = $q->execute();
    $cliente = $q->fetchAll();

    //2.preparar la sentencia SQL
    $sql ="SELECT ciudadOrigen, ciudadOrigen FROM vuelo";
     //3. prepara SQL sentencia
     $q = $cnx->prepare($sql);
     //4. Ejecuto SQL sentencia
    $result = $q->execute();
    $origenes = $q->fetchAll();
    
    //2.preparar la sentencia SQL
    $sql ="SELECT ciudadDestino, ciudadDestino FROM vuelodestino";
     //3. prepara SQL sentencia
     $q = $cnx->prepare($sql);
     //4. Ejecuto SQL sentencia
    $result = $q->execute();
    $destinos = $q->fetchAll();

?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear destino</title>
</head>
<body>
    <form action="guardar-destino.php" method="POST">
        Cliente <select name="cliente" id=""> <br>
<?php
    for($i=0; $i<count($cliente); $i++){
?>
        <option value="<?php echo $cliente[$i]["Nombre"] ?>">
        <?php echo $cliente[$i]["Nombre"]?>
    </option>
<?php
    } 
?>
        </select> <br> <br>
        Ciudad Origen <select name="vuelo" id=""> <br>
<?php
    for($i=0; $i<count($origenes); $i++){
?>
        <option value="<?php echo $origenes[$i]["ciudadOrigen"] ?>">
        <?php echo $origenes[$i]["ciudadOrigen"]?></option>
<?php
    }
?>
       </select> <br> <br>
        Ciudad Destino <select name="vuelodestino" id=""> <br>
<?php
    for($i=0; $i<count($destinos); $i++){
?>
        <option value="<?php echo $destinos[$i]["ciudadDestino"] ?>">
        <?php echo $destinos[$i]["ciudadDestino"]?></option>
<?php
    }
?>
        </select> <br> <br>

                <input type="submit" value="guardar destino">
   </form>
</body>
</html>