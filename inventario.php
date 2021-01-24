<?php
    //Esta página muestra todos los elementos del inventario, sus datos y una imagen de ella
    //Esta parte del código es auto explicatoria
    include("includes/connection.inc.php");
    $sql = "SELECT * FROM 
    sistemainventario 
    WHERE existencia > 0";
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
        <form action="buscar.php" method="POST">
            <input type="text" placeholder="Búsqueda" name="busqueda">
            <button type="submit" name="buscar">Buscar</button>
        </form>
        <?php
        //En esta parte del código, mientras haya más de 0 columnas, se traen los datos del zapato y se imprimen
        //En cada instancia se crea un botón por el que se pasa la ID al elemento de venta.php
            if($result->num_rows>0)
            {
                while($row = mysqli_fetch_array($result))
                {
                    echo "<div class='tabla'>";
                        echo"<img src='img/".$row['img_dir']."'>";
                        echo"<p> <b>Nombre: </b>".$row['nombrezapato']."</p>";
                        echo"<p> <b>Marca: </b>".$row['marca']."</p>";
                        echo"<p> <b>Talla: </b>".$row['talla']."</p>";
                        echo"<p> <b>Color: </b>".$row['color']."</p>";
                        echo"<p> <b>Precio: </b>$".$row['precio']."</p>";
                        echo"<a href='venta.php?id=".$row['id']."'><button>Comprar</button></a>";
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