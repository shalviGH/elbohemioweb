
<?php 
        require_once('../assets/header.php');
?>

<h1>Aca se mostrara la lista de productos agragados al carrito</h1>


<table class="table table-striped"  style="width: 80%; margin: 0 auto">
    <thead>
        <tr>
            <th>nombre</th>
            <th>precio</th>     
            <th>cantidad</th>
            <th>pago total</th>
        </tr>
    </thead>

    <tbody>

        <?php 
        @session_start();

        $numCarrito = 1;

        foreach($_SESSION['carrito'] as $carrito){?>

        

        <tr>
            <input type="hidden" id="idProducto<?php echo $numCarrito; ?>"  value="<?php echo $carrito['idProductos']; ?>"   >
            <input type="hidden" id="cantidad<?php echo $numCarrito; ?>"  value="<?php echo $carrito['cantidad']; ?>"   >
            <input type="hidden" id="precio<?php echo $numCarrito; ?>"  value="<?php echo $carrito['precio']; ?>"   >
            
            <td><?php echo $carrito['nombre']; ?></td>
            <td><?php echo $carrito['precio']; ?></td>
            <td><?php echo $carrito['cantidad']; ?></td>
            <td><?php echo $carrito['cantidad'] * $carrito['precio'];  ?></td>
        </tr>

        <?php $numCarrito++;   }?>


    </tbody>

</table>

<br>
<center>
    <button class="btn btn-primary js-btnVender">Vender</button>
</center>





<script>
    $('.js-btnVender').on('click', function(){
        

        var n = "<?php echo $numCarrito; ?>";

        var pagoTotal= 0;
        var cantidadPro = 0;

        for (let i = 1; i < n; i++) {
            var idProducto = $('#idProducto'+i).val();
            var cantidad = $('#cantidad'+i).val();
            var precio = $('#precio'+i).val();

            var pagoT = cantidad * precio; 
            
            //alert("idPro = "+idProducto+ "--cantidad = " +cantidad);
            var datos = "&idProducto="+idProducto+"&cantidad="+cantidad;

            cantidadPro = cantidadPro + cantidad;
            pagoTotal = pagoTotal + pagoT; 

            //$(location).attr('href','http://localhost/elbohemioweb/Controllers/FoodController.php?peticion=ventaProducto' + datos);
            var url = "http://localhost/elbohemioweb/Controllers/FoodController.php?peticion=ventaProducto";
            $.get(url,{idProducto:idProducto, cantidad:cantidad }, function(datos){
            });
            
        }
            // var datos2 = "&idUser="+2+"&precioTotal="+pagoTotal+"&cantidadPro="+cantidadPro;
             //$(location).attr('href','http://localhost/elbohemioweb/Controllers/FoodController.php?peticion=vender' + datos2);
            var numVenta = "<?php echo $idVenta; ?>"

            var url2 = "http://localhost/elbohemioweb/Controllers/FoodController.php?peticion=vender";
            $.get(url2,{idUser:10, numVenta:numVenta, pagoTotal:pagoTotal  }, function(datos){
            });
        
    });


</script>






<?php
    include("../assets/footer.php");
?>