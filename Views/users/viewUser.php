<?php 
        require_once('../../assets/header.php');
?>




    <?php if(isset($_SESSION['insertUser'])){
                    if($_SESSION['insertUser'] == "ok"){
                ?>

                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:80%; margin:0 auto;">
                    <strong>Mensage!</strong>   Los datos del usario se ha registrado con exito.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

        <?php } } $_SESSION['insertUser'] = ""; ?>


        
    <?php if(isset($_SESSION['updateUser'])){
                if($_SESSION['updateUser'] == "ok"){
            ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:80%; margin:0 auto;">
                <strong>Mensage!</strong> Los datos del usuario se ha actualizado con exito.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

    <?php } } $_SESSION['updateUser'] = ""; ?>

            
    <?php if(isset($_SESSION['deleteUser'])){
                if($_SESSION['deleteUser'] == "ok"){
            ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:80%; margin:0 auto;">
                <strong>Mensage!</strong> Losa datos del usuario se ha eliminado con exito.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

    <?php } } $_SESSION['deleteUser'] = ""; ?>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Agregar usuario
    </button>

    <?php 
  

        if(isset($_SESSION['data'])){
           // echo "datos del usuario encontrado";
        }else{
            //echo "los datos no se encontraron";
        }
    
    ?>


    <table class="table table-striped table-hover" style="width: 80%; margin:auto;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Telefono</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($_SESSION['data']  as $user){  ?>
                <tr>
                    <th scope="row">1</th>
                    <td><?php echo $user['nombreUsuario']; ?></td>
                    <td><?php echo $user['apellidos']; ?></td>
                    <td><?php echo $user['telefono']; ?></td>
                    <td>
                       <a href="" class="btn btn-primary js-btnUpdate"  data-bs-toggle="modal" 
                       data-bs-target="#modalUpdateUser"  js-id ="<?php echo $user['idUsuario']; ?>"
                                                            js-nombre ="<?php echo $user['nombreUsuario']; ?>"
                                                            js-apellido ="<?php echo $user['apellidos']; ?>"
                                                            js-telefono ="<?php echo $user['telefono']; ?>"
                                                            js-direccion ="<?php echo $user['direccion']; ?>"
                                                            js-usuario ="<?php echo $user['usuario']; ?>"
                                                            js-pass ="<?php echo $user['contraseña']; ?>"
                       
                       
                       >Editar</a>
                       <a href="../../Controllers/userController.php?peticion=eliminar&idU=<?php echo $user['idUsuario'] ?>" class="btn btn-danger" >Eliminar</a> 
                    </td>
                </tr>
            <?php } ?>

        </tbody>
    </table>




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  action="../../Controllers/userController.php?peticion=insertar" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese su nombre">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Apellidos:</label>
                <input type="text" name="apellidos" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese su apellido">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Telefono:</label>
                <input type="text" name="telefono" class="form-control" id="exampleFormControlInput1" placeholder="telefono">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Direccion:</label>
                <input type="text" name="direccion" class="form-control" id="exampleFormControlInput1" placeholder="escriba una direccion">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Usuario:</label>
                <input type="text" name="usuario" class="form-control" id="exampleFormControlInput1" placeholder="ingrese un nombre de usuario">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contraseña:</label>
                <input type="text" name="pass" class="form-control" id="exampleFormControlInput1" placeholder="ingreseuna contraseña facil de recordar">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tipo usuario:</label>

                <select name="tipoUsuario" id="" class="form-control">
                    <option value="1">Admin</option>
                    <option value="2">Usuario</option>
                </select>
            </div>
            
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
            
            <!--button type="submit" class="btn btn-primary">Guardar</button-->
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
</script>

<?php
    include("../../assets/footer.php");
?>