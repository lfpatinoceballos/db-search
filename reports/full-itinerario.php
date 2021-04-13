<?php
//$nombre;
    $where = '';
    if(isset($_REQUEST['nombre'])){
        $nombre = $_REQUEST['nombre'];
        if($nombre != ""){
        $where = "WHERE c.Nombre = '$nombre'";
        }
    }
    if(isset($_REQUEST['correo'])){
        $correo = $_REQUEST['correo'];
        if($correo != ""){
        $where = "WHERE c.Correo = '$correo'";
        }
    }
    //$clase;
    //$where = '';
    if(isset($_REQUEST['clase'])){
        $clase = $_REQUEST['clase'];
        if($clase != ""){
            if($where == ""){
                $where = "WHERE p.Clase = '$clase'";      
            }
            else{
                $where = "$where AND p.Clase = '$clase'";
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
    $sql ="SELECT c.Nombre,c.Telefono,c.Correo,i.Fecha_compra,i.Fecha_salida,p.Clase,p.Valor FROM cliente AS c JOIN itinerario i ON c.Id_cliente=i.Id_Cliente JOIN pasaje p ON i.Id_Pasaje=p.Id_Pasaje $where ORDER BY c.Nombre ASC";
    //3. prepara SQL sentencia
    $q = $cnx->prepare($sql);
    //4. Ejecuto SQL sentencia
    $result = $q->execute();
    // De la consulta traigame todo el resultado y guardelo en la variable itinerarios
    $itinerarios = $q->fetchAll();
    // Imprime todo lo que tiene la variable itinerarios
    //var_dump($itinerarios);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista itinerarios</title>
</head>
<body>
    <form action="full-itinerario.php">
        Clase
        <select name="clase">
            <option value="">Select</option>
            <option value="Clase económica">Clase económica</option>
            <option value="Clase ejecutiva">Clase ejecutiva</option>
            <option value="Primera clase">Primera clase</option>
            <option value="Clase intermedia">Clase intermedia</option>
        </select>
        <br/>  <br/>
        Nombre <input type="text" name="nombre">
        <br/>  <br/>
        Correo <input type="text" name="correo">
        <br/>  <br/>

        <input type="submit" value="Search AND"/>
        <hr/>
    </form>
    <h1>Lista Itinerarios</h1>
    <table border="1">
        <tr>
            <td>
                Nombre
            </td>
            <td>
                Telefono
            </td>
            <td>
                Correo
            </td>
            <td>
                Fecha_compra
            </td>
            <td>
                Fecha_salida
            </td>
            <td>
                Clase
            </td>
            <td>
                Valor
            </td>
        </tr>
<?php
    for($i=0; $i<count($itinerarios); $i++) {
?>   
    <tr>
        <td>
            <?php echo $itinerarios[$i]["Nombre"] ?>
        </td>
        <td>
            <?php echo $itinerarios[$i]["Telefono"] ?>
        </td>
        <td>
            <?php echo $itinerarios[$i]["Correo"] ?>
        </td>
        <td>
            <?php echo $itinerarios[$i]["Fecha_compra"] ?>
        </td>
        <td>
        <?php echo $itinerarios[$i]["Fecha_salida"] ?>
        </td>
        <td>
        <?php echo $itinerarios[$i]["Clase"] ?>
        </td>
        <td>
        <?php echo $itinerarios[$i]["Valor"] ?>
        </td>
    </tr>
<?php
    }
       
?>
    </table>
</body>
</html>