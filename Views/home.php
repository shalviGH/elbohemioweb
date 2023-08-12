

    <?php 
        require_once('assets/header.php');
    ?>



    <?php if(isset($_SESSION['login'])){
                if($_SESSION['login'] == "no"){
            ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width:80%; margin:0 auto;">
                <strong>Mensage!</strong> Usuario y/o contraseñas in correcto intente nuevamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

     <?php } } $_SESSION['login'] = ""; ?>


    <section>
        <div class="infoPoducto">
            <img src="<?php echo RUTA_URL;?>/images/comida1.jpg" alt="" height="150px" width="150px">
            <p class="info">Lorem, ipsum dolor sit amet consectetur 
                adipisicing elit. Temporibus aut maxime est sit 
                aspernatur ad voluptatibus fuga autem non nisi reiciendis, 
                suscipit eaque tempora provident vel 
                alias iusto fugit explicabo!</p>
        </div>

        <div class="infoPoducto">
            <img src="<?php echo RUTA_URL;?>/images/refresco1.jpg" alt="" height="150px" width="150px">
            <p class="info">Lorem, ipsum dolor sit amet consectetur 
                adipisicing elit. Temporibus aut maxime est sit 
                aspernatur ad voluptatibus fuga autem non nisi reiciendis, 
                suscipit eaque tempora provident vel 
                alias iusto fugit explicabo!</p>
        </div>
    </section>



   <!--Incluimos el login --> 
   <?php  include('login.php');  ?>

    <!--Incluimos el crear cuenta --> 
    <?php  include('users/crearCuenta.php');  ?>







  
    
    
</body>
</html>




<?php
    include("assets/footer.php");
?>