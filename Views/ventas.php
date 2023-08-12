
<?php 
        require_once('../assets/header.php');
?>

<center>
<nav class="navbar navbar-light bg-light" style="width:80%">
  <div class="container-fluid" class="md-6">
    <form class="d-flexcc" role="search" 
    style="width:70%; display:flex; align-items: 
    center;justify-content: space-between "
     action="<?php echo RUTA_URL;?>Controllers/FoodController.php?peticion=reporte" method="POST">
    <label for=""> Fecha Inicio 
        <input class="form-control me-1" type="date" placeholder="Ingrese el codigo del pedidovpara buscar" aria-label="Buscar" name="fechaInicio" required>
    </label>

    <label>
        Fecha Fin <input class="form-control me-1" type="date" placeholder="Ingrese el codigo del pedidovpara buscar" aria-label="Buscar" name="fechaFin" required>
    </label>
        <input class="btn btn-success js-btnSearch"  type="submit" value="Buscar por fecha" name="" style="margin-top:10px" >

        <input class="btn btn-success"  type="submit" value="Genera Reporte en pdf" name=""  style="margin-top:10px">
    </form>
  </div>
</nav>
</center>


    
<?php if(isset($_SESSION['ventas'])){
    if($_SESSION['ventas'] == ""){
      echo "<center><h1>No se encontraron resultados o na hay ventas en la fecha solicitada</h1></center>";
    }else{?>

    <center><h1>Lista de ventas</h1></center> 
    <table class="table table-striped"  style="width: 80%; margin: 0 auto">
        <thead>
            <tr>
                <th>N°</th>
                    
                <th>Producto</th>
                <th>Precio</th>
                <th>cantidad</th>
                <th>Pago Total</th>
                <th>Fecha</th>
            </tr>
        </thead>

        <tbody>

            <?php 
            @session_start();

            $numpedido = 1;

            foreach($_SESSION['ventas'] as $venta){?>
            <tr>
                <td><?php echo $numpedido; ?></td>
                <td><?php echo $venta['nombre']; ?></td>
                <td><?php echo $venta['precio']; ?></td>
                <td><?php echo $venta['cantidad']; ?></td>
                <td><?php echo $venta['precio'] * $venta['cantidad']; ?></td>
                <td><?php echo $venta['fecha']; ?></td>
                <!--td>
                    <button class="btn btn-success js-btnFinPedido" data-bs-toggle="modal" 
                    data-bs-target="#modalFinalizarPedido" ?>
                                                                                                                >Finalizar pedido</button>
                    <a class="btn btn-danger js-btnCancelPedido" data-bs-toggle="modal" data-bs-target="#modalCancelPedido" js-idProPedido ="<?php echo $venta['idPedido']; ?>"  >Cancelar</a>
                </td-->
            </tr>

            <?php $numpedido++; }?>


        </tbody>

    </table>


<?php   }
}

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
        <form action="<?php echo RUTA_URL;?>Controllers/FoodController.php?peticion=cancelarPedido" method="POST">
            <input class="js-txtIdPedido" type="hidden" name="idPedido" value="<?php echo $_SESSION['idProOrden']; ?>">

            

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
            <!--input class="js-txtIdUser" type="text" name="idUser" value="10">
            <input class="js-txtPagoTotal" type="text" name="pagoTotal" value="">
            <input class="js-txtNumventa" type="text" name="numVenta" value="<?php echo $idVenta  ?>">
            <input class="js-txtIdProducto" type="text" name="idProducto" value="">
            <input class="js-txtCantidad" type="text" name="cantidad" value="">
            <input class="js-txtIdPedido" type="text" name="idPedido" value=""-->
            
            

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

    $('.js-btnSearch').on("click", function(){
        $(this).attr('name','search');
    });

    $('.js-btnReport').on("click", function(){
        $(this).attr('name','report');
    });

        



</script>






<?php
    include("../assets/footer.php");
?>