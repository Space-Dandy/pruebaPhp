<?php
    /*
        Esta página reduce la existencia en 1, se muestran los datos del zapato seleccionado y se añade
        la venta a la tabla de ventas realizadas
    */
    include("includes/connection.inc.php");
    
    //Este código está dividido en  3 partes

    //La primera simplemente va y busca el zapato a la base de datos
    $_id = $_REQUEST['id']; //La ID pasada por la página anterior 
    $sql = "SELECT * FROM sistemainventario WHERE id = '$_id'"; //Se busca el elemento del inventario con dicha ID
    $result = mysqli_query($conn,$sql); 
    $row = mysqli_fetch_array($result); //Se guarda el resultado en un arreglo llamado row 

    //La siguiente crea un folio y agrega los datos del Zapato a una tabla llamada ventasRealizadas
    $_sqlObtenerID = "SELECT MAX(id) FROM ventasrealizadas"; //Se busca la Máxima ID para crear el folio y añadirlo a la base de datos
    $_resultObtenerID = mysqli_query($conn,$_sqlObtenerID);
    $_arregloVenta = mysqli_fetch_row($_resultObtenerID);
    $_idVenta = (int)$_arregloVenta[0] + 1; //Aquí la ID se le suma 1, ya que se añadirá al próximo campo en la base de datos
    $_fecha = date("d") . "/" . date("m") .  "/" . date("y"); //Obtiene la fecha actual y la concatena
    $_folio = $_fecha . "-" . (string)$_idVenta; //Folio
    $_nombreZapato = $row['nombrezapato']; 
    $_precioZapato = $row['precio']; 
    $_imgDir = $row['img_dir'];
    $_sqlAñadirVenta = "INSERT INTO ventasrealizadas (folio,nombreZapato,idZapato,precio,img_dir)
    VALUES ('$_folio','$_nombreZapato',$_id,'$_precioZapato','$_imgDir')"; 
    mysqli_query($conn,$_sqlAñadirVenta);

    //Por último en la tabla de sistemainventario se reduce la existencia en 1
    $_sqlReducirExistencia = "UPDATE sistemainventario 
    SET existencia = existencia - 1 
    WHERE id = $_id";
    mysqli_query($conn,$_sqlReducirExistencia);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Comprar Artículo</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <div class="box">
            <h2>La venta se ha realizado con éxito!</h2>
            <h3>Se ha comprado el siguiente artículo:</h3>
            <img src="img/<?php echo $row['img_dir']?>">
            <?php echo "<h2>".$row['nombrezapato']."</h2>"?>
            <?php echo "<label><b>Marca: </b>".$row['marca']."</label> <br>";?>
            <?php echo "<label><b>Talla: </b>" . $row['talla']. "</label> <br>"?>
            <?php echo "<label><b>Precio: </b>".$row['precio']."</label> <br>";?>
            <?php echo "<label><b>Color: </b>". $row['color']."</label> <br>";?>
            <?php echo "<label><b>Sucursal: </b>".$row['sucursal']."</label> <br>";?>
            <b><?php echo "El folio del artículo es: ".$_folio?></b>
        </div>
    </body>
</html>