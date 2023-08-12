
<?php 
        require_once('../assets/header.php');



        if(isset($_SESSION['pedido'])){
          if($_SESSION['pedido']== 'ok'){?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 80%; margin:0 auto;">
            <strong>Mensage!</strong> Su orden se ha realizado con exito. espere el codigo del pedido por email para recibir la entrega
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
            
        <?php $_SESSION['pedido']=""; }
        }
?>



<center><h1>Para continuar con tu orden, proporciona la información solicitada.</h1></center>

<div class="container mt-2" style="width: 80%; margin: 0 auto; margin-top:30px;">
<!--   <div class="card card-block mb-2">
    <h4 class="card-title">Card 1</h4>
    <p class="card-text">Welcom to bootstrap card styles</p>
    <a href="#" class="btn btn-primary">Submit</a>
  </div>   -->
  <div class="row" style="display: flex; align-items:center; justify-content:space-around; margin-top:30px;">
    <div class="" style="display: flex; background-color: white; width:40%; align-items:center; justify-content:space-around; border-radius:10px">
        <div class="card1 card-block1" style="padding: 20px; "  >
            <div style="display: flex;">
                <p>Llevamos tu orden <p>
                <p>Sólo indícansos</p>
                <p> tu dirección.</p>
            </div>
            <!--img src="https://static.pexels.com/photos/262550/pexels-photo-262550.jpeg" alt="Photo of sunset"-->
            <button class="btn btn-primary js-btnOrdenarTipo1" style="width: 70%; margin:0 auto; height:40px;" data-bs-toggle="modal" data-bs-target="#modalFinalizarOrden">Ordenar ahora</button>
        </div>
        
        <img src="<?php echo RUTA_URL?>images/imgRepartidor.svg" alt="" alt="Photo1 of1 sunset1" width="200px" height="200px">
    
    </div>

    <div class="" style="display: flex; background-color: white; width:40%; align-items:center; justify-content:space-around; border-radius:10px">
        <div class="card1 card-block1" style="padding: 20px; "  >
            <div style="display: flex;">
                <p>Recoge tu orden <p>
                <p>a la tienda</p>
                <p>Que elijas.</p>
            </div>
            <!--img src="https://static.pexels.com/photos/262550/pexels-photo-262550.jpeg" alt="Photo of sunset"-->
            <button class="btn btn-primary js-btnOrdenarTipo2" style="width: 70%; margin:0 auto; height:40px;" data-bs-toggle="modal" data-bs-target="#modalFinalizarOrden">Ordenar ahora</button>
        </div>
        
        <img src="<?php echo RUTA_URL?>images/descargar.png" alt="" alt="Photo1 of1 sunset1" width="200px" height="200px">
    
    </div>

  
</div>



<!-- Modal para finalizar pedido -->
<!-- Modal para finalizar pedido -->
<div class="modal fade" id="modalFinalizarOrden" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mensaje !</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class= "modal-body">
      <h5 class="modal-title" id="exampleModalLabel"></h5>
      <h5 class="modal-title js-tipoPedido" id="exampleModalLabel">Este texto es asignado de sde java script!</h5><br>

        <form action="<?php echo RUTA_URL;?>Controllers/OrdenController.php?peticion=ordenar&tipoPedido=1" method="POST">
           

            <input class="js-txtTipoPedido" type="hidden" name="tipoPedido" value="">
            <!--input class="js-txtId" type="text" name="cantidad" value="<?php echo $_SESSION['cantOrden']; ?>"-->
            <h6 class="modal-title" id="exampleModalLabel">Esta seguro que desea ordenar !</h6><br>


            <!--iv class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nombre de usuario:</label>
                <input type="text" name="nombreCliente" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese su nimbre de usuario" required>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Telefono:</label>
                <input type="phone" name="telefono" class="form-control" id="exampleFormControlInput1" placeholder="ingrese su numero de telefono correcto" required>
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Direccion:</label>
                <input type="text" name="direccion" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese una direccion correcta" required>
            </div-->

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
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
 <?php  include('login.php');  ?>




  <script>
    $('.js-btnOrdenarTipo2').on('click', function(){
      $('.js-txtTipoPedido').val('2');
      $('.js-tipoPedido').text('Su pedido ser entregado en el local correspondiente');
    });

    $('.js-btnOrdenarTipo1').on('click', function(){
      $('.js-txtTipoPedido').val('1');
      $('.js-tipoPedido').text('Su pedido sera entregado a domicilio');
    });
  </script>




<?php
    include("../assets/footer.php");
?>