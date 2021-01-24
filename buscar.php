<?php 
include('includes/connection.inc.php'); //Conexión
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
            if(isset($_POST['buscar'])) //Si se accede a la página por POST ejecuta el siguiente código
            {
                $busqueda = mysqli_real_escape_string($conn,$_POST['busqueda']); //Verifica que la búsqueda no contenga carácteres especiales

                //Query de SQL que busca los detalles de los zapatos
                $sql = "SELECT * FROM sistemainventario 
                WHERE nombrezapato LIKE '%$busqueda%'
                OR sucursal LIKE '%$busqueda%'
                OR color LIKE '%$busqueda%'
                OR marca LIKE '%$busqueda%' 
                AND existencia > 0";

                //Variable que guarda el resultado de la query
                $result = mysqli_query($conn,$sql);

                //Si el número de filas es mayor a 0 se hace esto
                if($result->num_rows > 0)
                {
                    while($row = mysqli_fetch_array($result)) //Busca todas las columna y escribe los datos
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
                    echo "<h2 class='centrar'>No se encontraron resultados</h2>";
            }
        ?>
</body>