
    <?php 
        require_once('../../assets/header.php');

        
    ?>




    <center><h1>Comidas</h1></center>

    <?php if(isset($_SESSION['orden'])){
            if($_SESSION['orden'] == "ok"){
        ?>

        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:80%; margin:0 auto;">
            <strong>Mensage!</strong> El producto se ha agreagado con exito al carrito de compras.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

   <?php } } $_SESSION['orden'] = ""; ?>



    <?php if(isset($_SESSION['insert'])){
            if($_SESSION['insert'] == "ok"){
        ?>

        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:80%; margin:0 auto;">
            <strong>Mensage!</strong> El producto  se ha guardado con exito.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

   <?php } } $_SESSION['insert'] = ""; ?>


   <!--Condicion si el producto se ha eliminado con exito-->             
   <?php if(isset($_SESSION['delete'])){
            if($_SESSION['delete'] == "ok"){
        ?>

        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:80%; margin:0 auto;">
            <strong>Mensage!</strong> El producto  se ha eliminado con exito.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

   <?php } } $_SESSION['delete'] = ""; ?>


      <!--Condicion si el producto se ha eliminado con exito-->             
      <?php if(isset($_SESSION['update'])){
            if($_SESSION['update'] == "ok"){
        ?>

        <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:80%; margin:0 auto;">
            <strong>Mensage!</strong> Los datos del producto se han actualizado con exito.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

   <?php } } $_SESSION['update'] = ""; ?>




    <?php 
        if($tipoUser == 1){?>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar comidas
            </button>
    <?php } ?>
  
        

    <?php 
        if(isset($_SESSION['message'])){
            if($_SESSION['message'] == "editOk"){
                
            }
        }
    ?>

    <section class="secComida" style="height: auto;">

        <?php 
        if(isset($_SESSION['productos'])){
        foreach($_SESSION['productos'] as $producto){
            
            $tipoProduct =  $producto['categoria'];
            
            if($tipoProduct == 1){?>
                        

        <div class="card-product"  
        style="height: 290px; width:30%; display:flex; flex-direction:column; justify-content:space-between"      
         js-idProducto="<?php echo $producto['idProductos']; ?>"
                                                                     js-precioPro="<?php echo $producto['precio']; ?>"
                                                                     js-nombrePro="<?php echo $producto['nombre']; ?>" 
                                                                     js-cantPro= "10"
                                                                     js-numVenta =<?php  ?> >

            <div class="cont-infoPro" 
            style="display:flex; width:100%; ">
                <p style="text-align:left;">Lorem ipsum dolor sit amet consectetur 
                    adipisicing elit. Explicabo, necessitatibus alias. 
                    Cum aspernatur voluptatem aliquam molestiae doloremque 
                    facere exercitationem!
                </p>
                <div style="display:flex; flex-direction:column; width:100%;">
                    <img src="<?php echo RUTA_URL;?>images/<?php echo $producto['imagen']; ?>" alt="" height="150px" width="150px">
                    <label>Nombre: <?php echo $producto['nombre']; ?> </label>
                    <label>precio: <?php echo "$".$producto['precio'].".00"; ?></label>
                </div>

            </div>
            <?php if($tipoUser !=1){ ?>    
                <form action="../../Controllers/ordenController.php?peticion=addCar" method="POST" class="formCar">
                    <input type="hidden" value="<?php echo $producto['idProductos']; ?>" name="idProducto">
                    <!--input type="hidden" class="js-cantidad" value="5" name="cantidad"-->
                    <input type="hidden" value="<?php echo $idUser; ?>" name="idCliente">
                    
                    <?php 
                        if(isset($_SESSION['usersession'])){?>

                            <button type="submit" class="btn btn-primary">Ordenar Comida</button>
                            
                            <div class="col-12 col-md-3">
                            <input type="number" name="cantidad" min="1" class="js-cantidad form-control row-1" value="1" width="100px">
                    </div>
                        <?php  }else{?>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalMessageOrdenar">Ordenar Comida</button>
                        <?php } ?>
                    
                    
                    
                    
                   
                </form>   
             <?php } ?>   

                




            <!--div class="precioComida">
                <img src="<?php echo RUTA_URL;?>images/<?php echo $producto['imagen']; ?>" alt="" height="180px" width="180px">
                <label>Nombre: <?php echo $producto['nombre']; ?> </label>
                <label>precio: <?php echo $producto['precio']; ?></label>

                <input type="number" class="inpCantidad js-cantidad form-control" value="1">

            </div>
            
            <div class="contRadio">
                    <input type="checkbox" class="radio js-radioPro" js-idProducto="<?php echo $producto['idProductos']; ?>"
                                                                     js-precioPro="<?php echo $producto['precio']; ?>"
                                                                     js-nombrePro="<?php echo $producto['nombre']; ?>" 
                                                                     js-cantPro= "10"
                                                                                                                    > 

                <p class="info">Lorem ipsum dolor sit amet consectetur 
                        adipisicing elit. Ipsum libero, ex accusantium, porro omnis 
                        saepe vel voluptates explicabo vitae suscipit temporibus recusandae
                        repellendus pariatur fuga vero, eos consequuntur 
                        laudantium nihil.  <?php echo $producto['descripcion']; ?></p-->
               
                <?php if($tipoUser ==1){ ?>    
                <div>
                    <a href="../../Controllers/FoodController.php?peticion=mostrar&idP=<?php echo $producto['idProductos']; ?> " class="btn btn-primary">Editar</a>
                    <a class="btn btn-danger js-btnDelete"  data-bs-toggle="modal" data-bs-target="#modalDelete" js-idProducto="<?php echo $producto['idProductos']; ?>" >Eliminar</a>
                
                
                </div> 
                <?php  } ?>
                <!--form action="../../Controllers/ordenController.php?peticion=addCar" method="POST" class="formCar">
                    <input type="hidden" value="<?php echo $producto['idProductos']; ?>" name="idProducto">
                    <input type="hidden" value="5" name="cantidad">
                    <input type="hidden" value="<?php echo $sessionId; ?>" name="idCliente">
                    <button type="submit" class="btn btn-primary">Ordenar Comida</button>
                    
                    <input type="number" class="inpCantidad js-cantidad form-control" value="1">

                </form--> 
                <!--a class="btn btn-success js-btnOrdenar" js-idPro="<?php echo $producto['idProductos']; ?>" >Ordena Aqui</a-->

                
            <!--/div-->  

        </div>

        
        <?php }
        }
    } else{
        header("Location: http://localhost/elbohemioweb/");

    }
    
    ?>


    </section>


    <?php 
        //require_once('../../assets/header.php');
    ?>



    <?php 


        if(isset($_SESSION['data'])){
           // echo "datos del usuario encontrado";
        }else{
            //echo "los datos no se encontraron";
        }
    
    ?>





<!-- Modal para agregar comidas -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar comida</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../../Controllers/FoodController.php?peticion=insertar&tipo=1" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nombre Comida:</label>
                <input type="text" name="nombre" class="form-control" id="exampleFormControlInput1" placeholder="ingrese nombre de comida">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Cantidad:</label>
                <input type="text" name="cantidad" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese El precio">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">precio:</label>
                <input type="text" name="precio" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese elprecio">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Imagen:</label>
                <input type="file" name="imagen" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese una imagen">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Descripcion:</label>
                <input type="text" name="descripcion" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese la descripcionn">
            </div>


            
           

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Categoria:</label>

                <select name="categoria" id="" class="form-control">
                    <option value="1">Comida</option>
                    <option value="2">Bebida</option>
                </select>
            </div>
            
            <center> 
                <button type="submit" class="btn btn-primary">Guardar</button>
            </center>
        </form>
        

      </div>
      <!--div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div-->
    </div>
  </div>
</div>








<!-- Modal -->
<div class="modal fade" id="modalUpdateUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  action="../../Controllers/userController.php?peticion=actualizar" method="POST">
            <div class="mb-3">
                <input type="text" name="idUsuario" class="form-control js-idUsuario" id="exampleFormControlInput1" placeholder="name@example.com">

                <label for="exampleFormControlInput1" class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control js-nombre" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Apellidos:</label>
                <input type="text" name="apellidos" class="form-control js-apellido" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Telefono:</label>
                <input type="text" name="telefono" class="form-control js-telefono" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Direccion:</label>
                <input type="text" name="direccion" class="form-control js-direccion" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Usuario:</label>
                <input type="text" name="usuario" class="form-control js-usuario" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contraseña:</label>
                <input type="text" name="pass" class="form-control js-pass" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tipo usuario:</label>

                <select name="tipoUsuario" id="" class="form-control">
                    <option value="1">Admin</option>
                    <option value="2">Usuario</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Guardar</button>
            
        </form>
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para eliminar comida -->
<!-- Modal para eliminar comida -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mensage</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class= "modal-body">
      <h5 class="modal-title" id="exampleModalLabel">Esta seguro eliminar este producto</h5>
        <form action="../../Controllers/FoodController.php?peticion=eliminar&tipo=1" method="POST">
            <input class="js-txtId" type="hidden" name="idPro">

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </form>
        
      </div>
      <!--div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div-->
    </div>
  </div>
</div>

<?php if($tipoUser == 2){
    
        if(isset($_SESSION['usersession'])){?>
    <div style="position: fixed; background-color: rgb(34, 27, 27); border-radius:10px; display:flex; 
        top: 80%;
        left: 2%;
        z-index: 2147483646; padding:10px">
    <a  style="display: flex; align-items:center; justify-content:center; flex-direction:column-reverse; outline: none;
    text-decoration: none;
    color:white" href="<?php echo RUTA_URL; ?>Controllers/ordenController.php?peticion=showCar">
    ver carrito <?php  if(isset($_SESSION['proCar'])){ count($_SESSION['proCar']); echo count($_SESSION['proCar']); }else{echo 0; }
        ?>
            <img src="<?php echo RUTA_URL; ?>images/imgCar.png" alt="" width="35px" height="35px">
    </a> 
    </div>

<?php } }?>





<!-- Modal para cancelar pedido -->
<div class="modal fade" id="modalMessageOrdenar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mensage!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class= "modal-body">
      <h5 class="modal-title" id="exampleModalLabel"> Para poder ordenar su comida es necesario tener una cuenta activa</h5>
        <form action="<?php echo RUTA_URL;?>Controllers/FoodController.php?peticion=cancelPedido" 
        data-bs-toggle="modal" data-bs-target="#modalCrearCuenta" method="POST">
            <input class="js-txtIdPedido" type="hidden" name="idPedido" value="">

            

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Crear cuenta</button>
            </div>
           
        </form>
        
      </div>
      <!--div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div-->
    </div>
  </div>
</div>





<!--Incluimos el login --> 
<?php  include('../login.php');  ?>


 <!--Incluimos el crear cuenta --> 
 <?php  include('../users/crearCuenta.php');  ?>




<script>
    $('.js-btnUpdate').on('click', function(){

        $('.js-idUsuario').val($(this).attr('js-id'));
        $('.js-nombre').val($(this).attr('js-nombre'));
        $('.js-apellido').val($(this).attr('js-apellido'));
        $('.js-telefono').val($(this).attr('js-telefono'));
        $('.js-direccion').val($(this).attr('js-direccion'));
        $('.js-usuario').val($(this).attr('js-usuario'));
        $('.js-pass').val($(this).attr('js-pass'));


    });



    

    /*$( '.js-radioPro' ).on( 'click', function() {
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
        alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
    }*/

    $('.js-radioPro1').on( 'change', function() {

        var id = $(this).attr('js-idProducto');
        var precio = $(this).attr('js-precioPro');
        var nombrePro = $(this).attr('js-nombrePro');
        var cantidad = $(this).attr('js-cantPro');

       alert(id + " ---> " + precio +" --> " + nombrePro +" ---> " + cantidad);
        


       /* if( $(this).is(':checked') ) {
            // Hacer algo si el checkbox ha sido seleccionado
            //alert("El checkbox con valor " + $(this).val() + " ha sido seleccionado");
            $(location).attr('href','http://localhost/elbohemioweb/Controllers/FoodController.php?peticion=addCar'  );
        }else {
            // Hacer algo si el checkbox ha sido deseleccionado
            alert("El checkbox con valor " + $(this).val() + " ha sido deseleccionado");
            $(this).is(':checked', false)
        }*/

    });


    $('.js-conDataPro').hover(function(){
        var id = $(this).attr('js-idProducto');
        var precio = $(this).attr('js-precioPro');
        var nombrePro = $(this).attr('js-nombrePro');
        var cantidad = $(this).attr('js-cantPro');   
        //var cantidad = $(this).attr('js-cantPro');

        var cantidad = $('.js-cantidad', this).val();

        //alert(id + " ---> " + precio+" --> " + nombrePro +" ---> " + cantidad);

        //$(location).attr('href','http://localhost/elbohemioweb/'  );
    });

    $('.js-btnDelete').on('click', function(){
        var idPro = $(this).attr('js-idProducto');
        $('.js-txtId').val(idPro);
        //alert(idPro);
    });

    var idProducto, cantidad, precio, idVenta, nombre, numVenta;

    $('.js-conDataProducto').hover(function(){

        numVenta = $(this).attr('js-numVenta');
        idProducto = $(this).attr('js-idProducto');
        cantidad = $(this).attr('js-cantPro');
        precio = $(this).attr('js-precioPro');
        nombre = $(this).attr('js-nombrePro');

        cantidad = $('.js-cantidad', this).val();
    });

    $(".js-cantidad").keyup(function(){
    	cantidad = $(".js-cantidad").val();
	}); 

    $('.js-radioPro').on('click', function(){
        ///alert(nombre+"---"+ idProducto+"--" + cantidad+"--" + precio);

        var datos = "&idProducto="+idProducto+"&cantidad="+cantidad+"&precio="+precio+"&idVenta="+numVenta+"&tipo=1";

        if(cantidad == ""){
            alert("debe ingresar una cantidad");
        }else{

            if( $(this).is(':checked') ) {
                $(location).attr('href','http://localhost/elbohemioweb/Controllers/FoodController.php?peticion=addCar' + datos);
            }else{
                $(this).is(':checked', false)
            }
        }

    
        
    });



    $('.js-btnOrdenar').on('click', function(){
       // alert("probando boton");

        var idPro = $(this).attr('js-idPro');

        alert(idPro+ "---<<<" + cantidad);
        var datos = "&idProductoOrden="+idPro+"&cantidadOrden="+cantidad;

        

        $(location).attr('href','http://localhost/elbohemioweb/Controllers/FoodController.php?peticion=opOrden' + datos);

    })




</script>

<?php
    include("../../assets/footer.php");
?>

  
    
    
</body>
</html>