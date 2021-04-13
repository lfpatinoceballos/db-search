<?php
//$nombre;
    $where = '';
    if(isset($_REQUEST['edad'])){
        $edad = $_REQUEST['edad'];
        if($edad != ""){
        $where = "WHERE c.Edad = '$edad'";
        }
    }
    //$where = '';
    if(isset($_REQUEST['Fecha_compra'])){
        $Fecha_compra = $_REQUEST['Fecha_compra'];
        if($Fecha_compra != ""){
        $where = "WHERE i.Fecha_compra = '$Fecha_compra'";
        }
    }
    //$clase;
    //$where = '';
    if(isset($_REQUEST['ciudad'])){
        $ciudad = $_REQUEST['ciudad'];
        if($ciudad != ""){
            if($where == ""){
                $where = "WHERE d.ciudadOrigen = '$ciudad'";      
            }
            else{
                $where = "$where OR d.ciudadOrigen = '$ciudad'";
            }
        }
        
    }
    

    //1.conectar a la base de datos
    $host = "localhost";
    $dbname = "aeropueto_db_2021_1";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    //2.preparar la sentencia SQL
    $sql ="SELECT c.Nombre,c.Edad,i.Fecha_compra,i.Fecha_salida,d.ciudadOrigen,d.ciudadDestino FROM cliente AS c JOIN itinerario i ON c.Id_cliente=i.Id_Cliente JOIN destino d ON d.Id_Destino=d.Id_Destino $where ORDER BY c.Nombre ASC";
    //3. prepara SQL sentencia
    $q = $cnx->prepare($sql);
    //4. Ejecuto SQL sentencia
    $result = $q->execute();
    // De la consulta traigame todo el resultado y guardelo en la variable itinerarios
    $clientes = $q->fetchAll();
    // Imprime todo lo que tiene la variable itinerarios
    //var_dump($itinerarios);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de clientes</title>
</head>
<body>
    <form action="full-clientes.php">
        Ciudad_Origen
        <select name="ciudad">
            <option value="">Select</option>
            <option value="Manizales">Manizales</option>
            <option value="Bogota">Bogota</option>
            <option value="Cali">Cali</option>
            <option value="Medellin">Medellin</option>
        </select>
        <br/>  <br/>
        Edad <input type="text" name="edad">    
        <br/>  <br/>
        Fecha_compra <input type="date" name="Fecha_compra">
        <br/>  <br/>
        <input type="submit" value="Search OR"/>
        <hr/>
    </form>
    <h1>Lista Clientes</h1>
    <table border="1">
        <tr>
            <td>
                Nombre
            </td>
            <td>
                Edad
            </td>
            <td>
                Fecha_compra
            </td>
            <td>
                Fecha_salida
            </td>
            <td>
                Ciudad origen
            </td>
            <td>
                Ciudad destino
            </td>
        </tr>
<?php
    for($i=0; $i<count($clientes); $i++) {
?>   
    <tr>
        <td>
            <?php echo $clientes[$i]["Nombre"] ?>
        </td>
        <td>
            <?php echo $clientes[$i]["Edad"] ?>
        </td>
        <td>
            <?php echo $clientes[$i]["Fecha_compra"] ?>
        </td>
        <td>
            <?php echo $clientes[$i]["Fecha_salida"] ?>
        </td>
        <td>
        <?php echo $clientes[$i]["ciudadOrigen"] ?>
        </td>
        <td>
        <?php echo $clientes[$i]["ciudadDestino"] ?>
        </td>
    </tr>
<?php
    }
       
?>
    </table>
</body>
</html>