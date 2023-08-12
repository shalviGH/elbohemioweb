
<?php 
        require_once('../assets/header.php');
?>

<center><h1>Mi orden</h1></center>


<table class="table table-striped"  style="width: 80%; margin: 0 auto; margin-top:30px;">
    <thead>
        <tr>
            <th>Num</th>
            <th>Producto</th>  
            <th>Imagen</th>   
            <th>precio</th>
            <th>Cantidad</th>
            <th>Total a pagar</th>
            <th>opciones</th>
        </tr>
    </thead>

    <tbody>

        <?php 
        @session_start();

        $numCarrito = 1;
        $pagoTotal = 0;

        //print_r($_SESSION['proCar']);

        foreach($_SESSION['proCar'] as $carrito){
                if($carrito['estatus'] != 0){?>
        

        <tr>
            <!--input type="hidden" id="idProducto<?php echo $numCarrito; ?>"  value="<?php echo $carrito['idProductos']; ?>"   >
            <input type="hidden" id="cantidad<?php echo $numCarrito; ?>"  value="<?php echo $carrito['cantidad']; ?>"   >
            <input type="hidden" id="precio<?php echo $numCarrito; ?>"  value="<?php echo $carrito['precio']; ?>"   -->
            
            <td><?php echo $numCarrito; ?></td>
            <td><?php echo $carrito['nombre']; ?></td>
            <td>    
                <img src="<?php echo RUTA_URL.'images/'.$carrito['imagen']; ?>" alt="" width="45px" height="45px">
            </td>
            <td><?php echo $carrito['precio']; ?></td>
            <td><?php echo $carrito['cantidad']; ?></td>
            <td><?php echo $carrito['cantidad'] * $carrito['precio'];  ?></td>
            <td>
                <?php if($carrito['estatus'] == 0){?>
                    <a class="btn btn-success" href="">Orden Realizado</a> 
                <?php }else{?>
                    <a class="btn btn-danger" href="../Controllers/ordenController.php?peticion=delete&id=<?php echo $carrito['idCarrito']; ?>">Quitar</a> 
                    
              <?php } ?>
           
            </td>
        </tr>

        <?php
        
             $pagoTotal = $pagoTotal+$carrito['cantidad'] * $carrito['precio'];  $numCarrito++;   
            } 
        }
        ?>


    </tbody>

</table>
<div style="margin-left: 200px; margin-top:30px">
    <h5 style="display: flex;">Total a pagar:<h3><?php echo "$".$pagoTotal.".00"; ?> </h3> </h5>
</div>

<br>
<center>
    <button class="btn btn-primary js-finOrden" >Finalizar Orden</button>
</center>



 <!--Incluimos el login --> 
 <?php  include('login.php');  ?>






<script>
    $('.js-finOrden').on('click', function(){
        
        
        $(location).attr('href','http://localhost/elbohemioweb/Views/orden.php');


          
    });


</script>






<?php
    include("../assets/footer.php");
?>