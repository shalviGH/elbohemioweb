
<?php 
    require_once('../../assets/header.php');

    //@session_start();
    //print_r($_SESSION['showProducto']);

    foreach($_SESSION['showProducto'] as $producto){
        $idP = $producto['idProductos'];
        $nombre = $producto['nombre'];
        $stock = $producto['stok'];
        $precio = $producto['precio'];
        $categoria = $producto['categoria'];
    }

?>




<div class="modal-body" style="width: 50%; margin:auto; background-color:blueviolet; padding:30px">
        <form  action="../../Controllers/FoodController.php?peticion=actualizar&tipo=<?php echo $_SESSION['tipoPro']; ?>" method="POST"  enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" name="idProducto" class="form-control" id="exampleFormControlInput1" value="<?php echo $idP; ?>">

                <label for="exampleFormControlInput1" class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" id="exampleFormControlInput1" value="<?php echo $nombre; ?>">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Cantidad:</label>
                <input type="text" name="cantidad" class="form-control" id="exampleFormControlInput1" value="<?php echo $stock; ?>">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">precio:</label>
                <input type="text" name="precio" class="form-control" id="exampleFormControlInput1" value="<?php echo $precio; ?>">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Imagen:</label>
                <input type="file" name="imagen" class="form-control" id="exampleFormControlInput1" placeholder="telefono">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Descripcion:</label>
                <input type="text" name="descripcion" class="form-control" id="exampleFormControlInput1" placeholder="telefono">
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



<?php
    include("../../assets/footer.php");
?>