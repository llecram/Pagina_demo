<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <style>
            body{
                background-image: url("img_scale/background.jpg");
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            .card { background-color: rgba(245, 245, 245, 4);  }
            .card-header, .card-footer { opacity: 2}
            .card-text, .card-title{
                color: green;
            }

            .carousel-inner img {
                width: 100%;
                height: 100%;
            }
        </style>
    </head>
    <body>
        <section>
            <?php
                $total=0;
                if(isset($_SESSION['carrito'])){
                    $datos=$_SESSION['carrito'];    
                    for ($i=0; $i < count($datos) ; $i++) { 
            ?>
                        <center>
                            <img src="img_scale/<?php echo $datos[$i]['Imagen']; ?>" alt="">
                            <span><?php echo $datos[$i]['Nombre']; ?></span><br>
                            <span>Precio: <?php echo $datos[$i]['Precio']; ?></span><br>
                            <span>Cantidad: <input type="text" name="" value="<?php echo $datos[$i]['Cantidad']; ?>"></span><br>
                            <span>TOTAL: <?php echo $datos[$i]['Precio'] * $datos[$i]['Cantidad']; ?></span><br>
                        </center>
            <?php
                    $total=($datos['$i']['Cantidad'] * $datos[$i]['Precio']) + $total;
                    }
                }else{
                    echo '</br></br><center><h2>El carrito de compras esta vacio</h2></center>';
                }
                echo '<center><h2>TOTAL: '.$total.'</h2></center>'
            ?>
            <center><a href="./">Ver Catalogo</a></center>
        </section>
    </body>
</html>