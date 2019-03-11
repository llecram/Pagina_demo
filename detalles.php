<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>

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

		
	<?php
		include "conexion.php";
		//$id=isset($_GET['id']) ? $_GET["id"] : '';
		//echo $_GET['id'];
		/*where id='$id'*/

		$res = $mysqli->query("SELECT * FROM productos where id=".$_GET['id'])or die(mysql_error());
		
		while ($f = $res->fetch_object()) {
	?>
		<div class="container">
            <div class="row">
                <div>
                    <center class="col-m-3 col-md-6 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="img_scale/<?php echo $f->imagen ?>" alt="">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $f->nombre ?></h4><br>
                                <p class="card-text"><?php echo $f->precio ?></p>
                            </div>
                            <div class="card-footer">
                                <a href="./carrito.php?id=<?php echo $f->id;?>" class="btn btn-primary">añadir</a>
                            </div>
                        </div>
                    </center>
                </div>
            </div>        
        </div>	
	<?php
		}
	?>
		

    <div class="col-lg-3 col-md-6 mb-4">
        
    </div>
</body>
</html>