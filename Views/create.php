<?php
     require_once("head.php");
?>

<?php 

   // require_once("../Controllers/LibroController.php");
    //$obj = new LibroController();

    //  $obj->guardar(); 

?>

<div class="container">
        <div class="row vh-40 justify-content-center align-item-center">
            <div class="mt-5 mb-5 col-auto p-5 card"  style="display:flex; height:100%">
                <form action="../Controllers/LibroController.php?requestBook=insert" method="POST" >
                    <fieldset class="" >
                        <legend>Registrar</legend>
                            <div class="row-cols-sm-1 mb-3 input-group">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nameBook" required>
                            </div>
        
                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">Volumen</label >
                                <select id="disabledSelect" class="form-select" name="volumen" required>
                                    <option>Volumen de Libro</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Etiqueta</label>
                                <input type="text" class="form-control" name="etiqueta" required> 
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Autor</label>
                                <input type="text" class="form-control" name="autor" required>
                            </div>

                            <!--div class="mb-3">
                                <label class="form-label">Fecha Creacion</label>
                                <input type="text" class="form-control" name="fechaReg">
                            </div-->

                            <div class="mb-3">
                                <label for="disabledSelect" class="form-label">estatus</label>
                                <select id="disabledSelect" class="form-select" name="estatus" required>
                                    <option>Estatus</option>
                                    <option value="1">activo</option>
                                    <option value="0">no activo</option>
                                </select>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Guardar</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>


<?php
    require_once("footer.php");
?>