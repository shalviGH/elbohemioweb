<?php 
        require_once('../../assets/header.php');
?>


    
<?php 
  if(isset($_SESSION['updateUser'])){
    if($_SESSION['updateUser'] == "ok"){?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Message!</strong>Los datos se han actualizado conexito.
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>


<?php $_SESSION['updateUser'] = ""; }
  }

?>





<section style="background-color: none; margin-top:-90px">
    <div class="container py-5">
           <center><h1>Editar perfil</h1></center> <br>
           
    <div class="row">
        

        <div class="col-lg-8" style="margin: 0 auto;">
            <div class="card mb-4">
                <form action="../../Controllers/userController.php?peticion=actualizar&profile=1" method="POST">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nombre</p>
                            </div>s
                            <div class="col-sm-9">
                                <input  class="form-control text-muted mb-0" type="hidden" value="<?php echo $_SESSION['profile']['idUsuario']; ?>" name="idUsuario">

                                <input  class="form-control text-muted mb-0"  value="<?php echo $_SESSION['profile']['nombreUsuario']; ?>" name="tipoUsuario">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Apellidos</p>
                            </div>
                            <div class="col-sm-9">
                                <input  class="form-control text-muted mb-0"  value="<?php echo $_SESSION['profile']['apellidos']; ?>" name="apellidos">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Telefono</p>
                            </div>
                            <div class="col-sm-9">
                                <input  class="form-control text-muted mb-0"  value="<?php echo $_SESSION['profile']['telefono']; ?>" name="telefono">
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Direccion</p>
                            </div>
                            <div class="col-sm-9">
                                <input  class="form-control text-muted mb-0"  value="<?php echo $_SESSION['profile']['direccion']; ?>" name="direccion">
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Usuario</p>
                            </div>
                            <div class="col-sm-9">
                                <input  class="form-control text-muted mb-0 " value="<?php echo $_SESSION['profile']['usuario']; ?>" name="usuario">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Contraseña</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="password"  class="form-control text-muted mb-0 " value="<?php echo $_SESSION['profile']['contraseña']; ?>" name="pass">
                            </div>
                        </div>

                        
                    <input type="text"  class="form-control text-muted mb-0 " value="<?php echo $_SESSION['profile']['tipoUsuario']; ?>" name="tipoUsuario">
                            


                        

                        <br>
                        <center>
                            <div class="row">
                                <div class="col-sm-6">
                                    <a class="btn form-control bg-danger" href="../../index.php">cancelar</a>
                                </div>
                                <div class="col-sm-6">
                                    <input  class="form-control text-muted mb-0 bg-success" type="submit" value="Guardar cambios">

                                </div>
                            </div>
                        </center>
                    </div>

                    

                </form>
            </div>

        </div>

</section>



<?php
    include("../../assets/footer.php");
?>