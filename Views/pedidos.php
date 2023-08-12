
<?php 
        require_once('../assets/header.php');
?>

<center>
<nav class="navbar navbar-light bg-light" style="width:80%">
  <div class="container-fluid" class="md-6">
    <form class="d-flex" role="search" style="width:30%" action="<?php echo RUTA_URL;?>Controllers/FoodController.php?peticion=buscarPedido" method="POST">
      <input class="form-control me-1" type="search" placeholder="Ingrese el codigo del pedidovpara buscar" aria-label="Buscar" name="codigoPedido">
      <button class="btn btn-outline-success" type="submit">Buscar</button>
    </form>
  </div>
</nav>
</center>

<center><h1>Lista de pedidos</h1></center> 
    
<?php 
  if(isset($_SESSION['venta'])){
    if($_SESSION['venta'] == "ok"){?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Message!</strong>La  Entrga se ha realizado con exito.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>


<?php $_SESSION['venta'] = ""; }
  }

?>


<table class="table table-striped"  style="width: 80%; margin: 0 auto">
    <thead>
        <tr>
            <th>N°</th>
            <th>Codigo pedido</th>
            <th>Cliente</th>     
            <th>Producto</th>
            <th>Precio</th>
            <th>cantidad</th>
            <th>Pago Total</th>
            <th>Opciones</th>
        </tr>
    </thead>

    <tbody>

        <?php 
        @session_start();

        $numpedido = 1;

        if(isset($_SESSION['busquedaPedido']) & isset($_SESSION['pedidos']) ){
            if($_SESSION['busquedaPedido'] !="" ){
                $pedidos = $_SESSION['busquedaPedido'];
                $pe = "true";
            }
            if($_SESSION['pedidos'] !="" ){
                $pedidos = $_SESSION['pedidos'];
                $pe = "false";
            }
            
            $pagoTotal= 0;
        }

        foreach($pedidos as $pedido){?>
        <tr>
            <td><?php echo $pedido['idPedido']; ?></td>
            <td><?php echo $pedido['codigo']; ?></td>
            <td><?php echo $pedido['nombreUsuario']; ?></td>
            <td><?php echo $pedido['nombre']; ?></td>
            <td><?php echo $pedido['precio']; ?></td>
            <td><?php echo $pedido['cantidad']; ?></td>
            <td><?php echo $pedido['precio'] * $pedido['cantidad']; ?></td>
            <td>
                <!--button class="btn btn-success js-btnFinPedido" data-bs-toggle="modal" 
                data-bs-target="#modalFinalizarPedido" js-numVenta ="<?php echo $idVenta; ?>"
                                                        js-idProducto ="<?php echo $pedido['idProductos'] ?>"
                                                        js-idPedido ="<?php echo $pedido['idPedido'] ?>"
                                                        js-cantidad ="<?php echo $pedido['cantidad'] ?>"
                                                        js-pagoTotal = <?php echo $pedido['precio'] * $pedido['cantidad']; ?>
                                                                                                            >Finalizar pedido</button-->
                <button class="btn btn-danger js-btnCancelPedido" data-bs-toggle="modal" data-bs-target="#modalCancelPedido" js-idProPedido="<?php echo $pedido['idPedido']; ?>"  >Cancelar Pedido</a>
            </td>
        </tr>

        <?php $numpedido++;  $pagoTotal =  $pagoTotal+($pedido['precio'] * $pedido['cantidad']); }?>


    </tbody>

</table>

  <?php 
    if($pe == "true"){?>
      <div style="background-color: white; width:50%; display:flex; justify-content:space-around; margin: 0 auto; margin-top:30px; padding:20px;" >
        <h3>Total a pagar: $<?php echo $pagoTotal;?>.00</h3>
        <a class="btn btn-primary" href="<?php echo RUTA_URL;?>Controllers/FoodController.php?peticion=realizarEntrega">Realizar entrega</a>
      </div>
      
  <?php  }


?>

<br>



<!-- Modal para cancelar  pedido -->
<!-- Modal para cancelar pedido -->
<div class="modal fade" id="modalCancelPedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mensage!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class= "modal-body">
      <h5 class="modal-title" id="exampleModalLabel"> Esta seguro que desea cancelar el pedido</h5>
        <form action="<?php echo RUTA_URL;?>Controllers/FoodController.php?peticion=cancelPedido" 
        data-bs-toggle="modal" data-bs-target="#modalCancelPedido" method="POST">
            <input class="js-txtIdPedido" type="hidden" name="idPedido" value="">

            

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


<!-- Modal para finalizar pedido -->
<!-- Modal para finalizar pedido -->
<div class="modal fade" id="modalFinalizarPedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mensage!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class= "modal-body">
      <h5 class="modal-title" id="exampleModalLabel">Esta seguro que desea Finalizar pedido</h5>
        <form action="<?php echo RUTA_URL;?>Controllers/FoodController.php?peticion=venderPedido" method="POST">
            <input class="js-txtIdProducto" type="text" name="idProducto" value="">
            
            

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



<script>

    $('.js-btnCancelPedido').on('click', function(){
        var idPedido = $(this).attr('js-idProPedido');

        $('.js-txtIdPedido').val(idPedido);
    });

    /*$('.js-btnFinPedido').on("click", function(){


      var numVenta = $(this).attr('js-numVenta');
      var pagoTotal= $(this).attr('js-pagoTotal');
      var idP = $(this).attr('js-idProducto');
      var cantidad = $(this).attr('js-cantidad');
      var idPedido = $(this).attr('js-idPedido');

      $('.js-txtIdProducto').val(idP);
      $('.js-txtPagoTotal').val(pagoTotal);
      $('.js-txtCantidad').val(cantidad);
      $('.js-txtIdPedido').val(idPedido);

      //alert(numVenta, pagoTotal);



    });*/


</script>






<?php
    include("../assets/footer.php");
?>