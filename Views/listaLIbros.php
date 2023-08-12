<?php
    //require_once("assets/head.php");
    require("../assets/head.php");

    session_start();
?>
 <div class="container mt-5">
    <a class="btn btn-primary" href="create.php" role="button">Agregar nuevo libro</a>
 </div>
    
    <center> <h3>Lista de libros disponibles</h3></center>
    <div class="container mt-5">
            
        <table class="table table-striped table ">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Volumen</th>
                    <th scope="col">Etiqueta</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Estatus</th>
                    <th scope="col" colspan="2">Opciones</th>
                </tr>
            </thead>


            <tbody>
                <?php 
                    foreach ($_SESSION['data'] as $libro){
                        # code...
                       $status = $libro['estatus'];
                        if($status !=0){

                        
                
                ?>
                <tr>
                    <td><?php echo $libro['nombre']; ?></td>
                    <td><?php echo $libro['volumen']; ?></td>
                    <td><?php echo $libro['etiqueta']; ?></td>
                    <td><?php echo $libro['autor']; ?>o</td>
                    <td><?php $estatus = $libro['estatus']; if($estatus == 1){echo "disponible"; }else{
                        echo "No disponible";
                    } ?></td>
                    <td><a class="btn btn-primary js-btnUpdate" data-bs-toggle="modal" data-bs-target="#delete2" id="btnActualizar"
                    js-id = "<?php echo $libro['id_libro']; ?>"
                    js-nombre = "<?php echo $libro['nombre']; ?>"
                    js-volumen = "<?php echo $libro['volumen']; ?>"
                    js-etiqueta = "<?php echo $libro['etiqueta']; ?>"
                    js-autor = "<?php echo $libro['autor']; ?>"
                    js-estatus = "<?php echo $libro['estatus']; ?>"
                    href="../controllers/update.php?idLibro=<?php echo $libro['id_libro']; ?>">Actualizar</a></td>

                    <td><button type="button" class="btn btn-danger js-eliminar" data-bs-toggle="modal" data-bs-target="#delete" jsId = "<?php echo $libro['id_libro']; ?>" >Eliminar</button></td>
                </tr>
                <?php 
                        }
                    }
                ?>
            </tbody>
            
        </table>
       
    </div>

   <center> <h3>Lista de libros no disponibles</h3></center>
    <div class="container mt-5">
        <table class="table table-striped table ">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Volumen</th>
                    <th scope="col">Etiqueta</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Estatus</th>
                    <th scope="col" colspan="2">Opciones</th>
                </tr>
            </thead>


            <tbody>
                <?php 
                    foreach ($_SESSION['data'] as $libro){
                        # code...
                       $status = $libro['estatus'];
                        if($status !=1){

                        
                
                ?>
                <tr>
                    <td><?php echo $libro['nombre']; ?></td>
                    <td><?php echo $libro['volumen']; ?></td>
                    <td><?php echo $libro['etiqueta']; ?></td>
                    <td>Anonimo</td>
                    <td><?php $estatus = $libro['estatus']; if($estatus == 1){echo "disponible"; }else{
                        echo "No disponible";
                    } ?></td></td>

                    <td><button type="button" class="btn btn-success js-btnActivar" data-bs-toggle="modal" data-bs-target="#delete1" jsId = "<?php echo $libro['id_libro']; ?>" >Activar</button></td>
                </tr>
                <?php 
                        }
                    }
                ?>
            </tbody>
            
        </table>
    </div>



   
	<div id="delete" class="modal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Quitar información de la lista</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Esta seguro que desea desactivar este articulo </p>
				</div>
                
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
				    <form action="../Controllers/LibroController.php?requestBook=desactive" method="POST">
                        <input type="hidden" value="" class="jsILibro" name="idLibro">

                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </form>	
				</div>
			</div>
		</div>
	</div>

  



    
	<div id="delete1" class="modal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Mostrar en la lista de libro activos</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>Esta seguro que desea activar el libro</p>
				</div>
                
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
				    <form action="../Controllers/LibroController.php?requestBook=active" method="POST">
                        <input type="hidden" value="" class="jsILibroAc" name="idLibro">

                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </form>	
				</div>
			</div>
		</div>
	</div>



    <div id="delete2" class="modal" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Actualizar informacion</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">

                <form action="../Controllers/LibroController.php?requestBook=update" method="POST">
                    <fieldset class="">
                        <!--legend>Registrar</legend-->
                             <input type="text" class="form-control" name="idLibro" id="js-idLibro">

                            <div class="row-cols-sm-1 mb-3 input-group">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nameBook" id="js-name">
                            </div>
        
                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Volumen</label>
                                <select id="disabledSelect" class="form-select" name="volumen">
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Etiqueta</label>
                                <input type="text" class="form-control" name="etiqueta"  id="js-etiqueta">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Autor</label>
                                <input type="text" class="form-control" name="autor" id ='js-autor'>
                            </div>

                            <!--div class="mb-3">
                                <label class="form-label">Fecha Creacion</label>
                                <input type="text" class="form-control" name="fechaReg">
                            </div-->

                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">estatus</label>
                                <select id="disabledSelect" class="form-select" name="estatus">
                                    <option value="1">activo</option>
                                    <option value="0">no activo</option>
                                </select>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Guardar</button>
                    </fieldset>
                </form>
				</div>
                
				<div class="modal-footer">
					<!--button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button-->
				    
				</div>
			</div>
		</div>
	</div>


    <script>

        $('.js-eliminar').on('click', function(){

            var idLibro = $(this).attr('jsId');

            //alert(idLibro);
            $('.jsILibro').val(idLibro);
        }); 


        $('.js-btnActivar').on('click', function(){
            var idLibro = $(this).attr('jsId');
            $('.jsILibroAc').val(idLibro);
           // alert(idLibro);

        });

        $('.js-btnUpdate').on('click', function(){
            var id = $(this).attr('js-id');
            var nombre = $(this).attr('js-nombre');
            var volume = $(this).attr('js-volume');
            var etiqueta = $(this).attr('js-etiqueta');
            var autor = $(this).attr('js-autor');
            var estatus = $(this).attr('js-estatus');

            $('#js-idLibro').val(id);
            $('#js-name').val(nombre);
            $('#js-etiqueta').val(etiqueta);
            $('#js-autor').val(autor);
            //alert(id);
        });
    </script>            













    <?php
   require("../assets/footer.php");
?>
</body>
</html>