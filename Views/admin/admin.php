
    <?php 
        
        require_once('../../assets/header.php');

        //print_r($_SESSION['usersession']);


        
    ?>

    
    <?php if(isset($_SESSION['login'])){
                if($_SESSION['login'] == "ok"){
            ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:80%; margin:0 auto;">
                <strong>Mensage!</strong> Usuario Logedo correctament.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

    <?php } } $_SESSION['login'] = ""; ?>




    <section>
        <div class="infoPoducto">
            <img src="<?php echo RUTA_URL;?>images/code2.png" alt="" height="150px" width="150px">
            <p class="info">Lorem, ipsum dolor sit amet consectetur 
                adipisicing elit. Temporibus aut maxime est sit 
                aspernatur ad voluptatibus fuga autem non nisi reiciendis, 
                suscipit eaque tempora provident vel 
                alias iusto fugit explicabo!</p>
        </div>

        <div class="infoPoducto">
            <img src="<?php echo RUTA_URL;?>images/girl.jpg" alt="" height="150px" width="150px">
            <p class="info">Lorem, ipsum dolor sit amet consectetur 
                adipisicing elit. Temporibus aut maxime est sit 
                aspernatur ad voluptatibus fuga autem non nisi reiciendis, 
                suscipit eaque tempora provident vel 
                alias iusto fugit explicabo!</p>
        </div>
    </section>







    
<!-- Modal -->
<div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Iniciar session</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="Controllers/userController.php?peticion=login" method="POST">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Usuario</label>
                <input type="text" id="form2Example1" class="form-control" name="user"/>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Contraseña</label>
                <input type="password" id="form2Example2" class="form-control" name="pass" />
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
                <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                    <label class="form-check-label" for="form2Example31"> Remember me </label>
                </div>
                </div>

                <div class="col">
                <!-- Simple link -->
                <a href="#!">Olvideste la contraseña?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Entrar</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Not a member? <a href="#!">Register</a></p>
                <p>or sign up with:</p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                <i class="fab fa-github"></i>
                </button>
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



  
    
    
</body>
</html>




<?php
    include("../../assets/footer.php");
?>