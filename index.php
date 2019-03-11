

<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">

        <style>
            body{
                background-image: url("img_scale/background.jpg");
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            .card { background-color: rgba(245, 245, 245, 2);  }
            .card-header, .card-footer { opacity: 2}
            .card-text, .card-title{
                color: green;
            }

            .carousel-inner img {
                width: 100%;
                height: 100%;
            }
            .font_style{
                font-family: 'Kaushan Script', cursive;
                font-size: 48px;
            }
            .span{
                font-family: 'Kaushan Script', cursive;
                font-size: 48px;
            }
        </style>
    </head>
    <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">INICIO</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#about">Informacion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#services">Tienda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="#contact">Contactenos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
        </br>
        </br>
        </br>
        
    <section id="about">
        <?php
            include "conexion.php";
            
        ?>
        <div class="container">
            <div class="row">
                <div class="col font_style">
                    <center><span>CARRUSEL</span></center>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ul class="carousel-indicators">
                            <?php
                                $res = $mysqli->query("SELECT * FROM slides");
                                while ($f = $res->fetch_object()) {
                            ?>
                                <li data-target="#demo" 
                                    data-slide-to=
                                        "<?php
                                            echo $f->id -1;
                                        ?>" 
                                    class=
                                        "<?php
                                            if($f->id == 1)
                                                echo "active";
                                        ?>">
                                </li>
                            <?php
                                }
                            ?>
                        </ul>
                        <!-- The slideshow -->
                        
                        <div class="carousel-inner">
                            <?php
                                $res = $mysqli->query("SELECT * FROM slides");
                                while ($f = $res->fetch_object()) {
                            ?>
                                <div class=" 
                                    <?php
                                        if($f->id == 1)
                                            echo "carousel-item active";
                                        else
                                            echo "carousel-item";
                                    ?>
                                ">
                                    <img src="img_scale/<?php echo $f->imagen;?>" alt="" width="1100" height="500">
                                    <span><?php $f->nombre; ?></span>
                                    <span><?php $f->descripcion; ?></span>
                                </div>
                                
                            <?php
                                }
                            ?>
                        </div>

                        <!-- Left and right controls -->
                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
            </div>
            </br>
            </br>
        </div>
    </section>
        
    <section id="services" class="bg-dark text-success">
        <div class="container-fluid" >
            <div class="row">
                <div class="col font_style">
                    <center>TIENDA</center>
                </div>
            </div>
            <div class="row text-center">
                <?php
                    include "conexion.php";
                    $res = $mysqli->query("SELECT * FROM productos")or die(mysql_error());              

                    while($f = $res->fetch_object())
                    {
                ?>
                        <div class="col-lg-3 col-md-6 mb-4">

                            <div class="card h-100">
                                <img class="card-img-top" src="img_scale/<?php echo $f->imagen ?>" alt="">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $f->nombre ?></h4><br>
                                    <p class="card-text"><?php echo $f->precio ?></p>
                                </div>
                                <div class="card-footer">
                                    <a href="./detalles.php?id=<?php echo $f->id;?>" class="btn btn-primary">seleccionar</a>
                                </div>
                            </div>
                        </div>
                
                <?php
                    }
                ?>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col font_style">
                    <center>Contactenos</center>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <p class="lead">Pedidos y consultas de stock a los siguientes correos</p>
                    <ul>
                        <li>@gmail</li>
                        <li>@facebook</li>
                        <li>+69 545612314</li>
                        <li>+1 685454774</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    </body>
</html>