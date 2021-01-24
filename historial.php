<?php
    //Esta página muestra todas las ventas realizadas, es un historial de ventas
    include("includes/connection.inc.php");
    $sql = "SELECT * FROM  ventasrealizadas";
    $result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Inventario</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/estilo.css">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php
        //Esto es prácitcamente un copypaste de la página de inventario
            if($result->num_rows>0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    echo "<div class='tabla'>";
                        echo"<img src='img/".$row['img_dir']."'>";
                        echo"<p> <b>Nombre: </b>".$row['nombreZapato']."</p>";
                        echo"<p> <b>Fecha: </b>".$row['fecha']."</p>";
                        echo"<p> <b>Precio: </b>".$row['precio']."</p>";
                        echo"<p> <b>Nombre del Vendedor: </b></p>";
                    echo"</div>";
                }
            }
            else
            {
                echo "<h2 class='centrar'>No hay ningún elemento en existencia en la base de datos</h2>";
            }

        ?>
    </body>
</html>