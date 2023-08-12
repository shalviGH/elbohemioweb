<?php  

    @session_start();
    
    $sessionId = session_id();

    //echo $sessionId; 
    //phpinfo();

    define('RUTA_URL', 'http://localhost/elbohemioweb/');


    $tipoUser = 2;
    
   // print_r($_SESSION['usersession']);
    
    if(isset($_SESSION['usersession'])){
        foreach($_SESSION['usersession'] as $user){
         $tipoUser = $user['tipoUsuario'];
         $idUser = $user['idUsuario'];
        }
        $tipoUser = $user['tipoUsuario'];
        $idUser = $user['idUsuario'];

        //echo  $idUser;
    }else{
      //header("Location: index.php");
    }
    //echo $tipoUser; 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?php echo RUTA_URL;?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL;?>public/css/style.css">
    <script type="text/javascript" src="<?php echo RUTA_URL;?>public/js/jquery.min.js"></script>

</head>
<body>

<div class="contNav">
        <img src="<?php echo RUTA_URL?>images/imgAddUser.png" class="logo" alt="" width="100px" height="100px">

        <nav class="navbar navbar-expand-lg navbar-light bg-light1 contMain" style="background-color: rgba(213, 118, 40, 0.961);" >
            <div class="container-fluid">
                <a class="navbar-brand" href="#">El bohemio</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?php echo RUTA_URL;?>index.php">Inicio</a>
                    </li>
                    <!--li class="nav-item">
                    <a class="nav-link" href="#">A cerca de</a>
                    </li-->
                    <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTA_URL;?>Controllers/FoodController.php?peticion=listaProducto&tipo=1">Comidas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo RUTA_URL;?>Controllers/FoodController.php?peticion=listaProducto&tipo=2">Bebidas</a>
                    </li>
                    <!--Contenedorli class="nav-item">
                        <a class="nav-link disabled">Contactos</a>
                    </li-->

                  


                    <?php 
                        if(isset($_SESSION['usersession'])){?>
                        <li class="nav-item">
                                <a class="nav-link" href="<?php echo RUTA_URL;?>Controllers/userController.php/?peticion=profile">Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo RUTA_URL;?>Controllers/FoodController.php/?peticion=miCompra">Historial</a>
                        </li>
                            
                            
                    <?php  }else{?>
                        <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="modal" data-bs-target="#modalCrearCuenta">Registrarse</a>
                            </li>
                    <?php } ?>

                    <?php if(isset($_SESSION['usersession'])){?>
                        
                        <?php if($tipoUser == 1){?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo RUTA_URL;?>Controllers/userController.php/?peticion=listaUser">Usuarios</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo RUTA_URL;?>Controllers/FoodController.php/?peticion=listaPedidos">Pedidos</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo RUTA_URL;?>Controllers/FoodController.php?peticion=ventas">Ventas</a>
                            </li>
                        <?php } ?>

                    
                    
                    <?php }?>


                </ul>
                </div>
            </div>
            <!--Contenedor para el buscador-->
            <div class="container-fluid">
                <!--a class="navbar-brand">Navbar</a-->
                <form class="d-flex" action="<?php echo RUTA_URL;?>Controllers/FoodController.php/?peticion=buscar&tipo=1" method="POST">
                <input class="form-control me-2" type="search" placeholder="Escriba el nombre de algun producto para buscar" aria-label="Search" name="producto">
                <button class="btn btn-outline-primary" type="submit">Search</button>
                </form>
            </div>

        </nav>

        <div class="contInicio">
            <img src="<?php echo RUTA_URL?>images/imgAddUser.png" alt="" width="80px" height="80px">
            

            <?php 
                if(isset($_SESSION['usersession'])){?>

                    <a class="btn btn-primary btnInicio" href="<?php echo RUTA_URL;?>Controllers/userController.php/?peticion=cerrarsession">Cerrar session</a>
                    
              <?php  }else{?>
                    <button class="btn btn-primary btnInicio"   data-bs-toggle="modal" data-bs-target="#modalLogin">iniciar Session</button>
           <?php } ?>
        
        </div>

    </div>

   


<?php if(isset($_SESSION['register'])){
            if($_SESSION['register'] == "ok"){
        ?>

        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:80%; margin:0 auto;">
            <strong>Mensage!</strong> Su cuenta se ha creado con exito ya puede iniciar sesion.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

<?php } } $_SESSION['register'] = ""; ?>







