<!-- Modal -->
<div class="modal fadex" id="modalCrearCuenta" tabindex="-1" aria-labelledby="exampleModalLabel5" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formualario de registro</h5>
        <button type="button" class="btn-close js-btnClose" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  action="http://localhost/elbohemioweb/Controllers/userController.php?peticion=crearCuenta" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nombre:</label>
                <input type="text" name="nombre" class="form-control js-nombre" id="exampleFormControlInput1" required placeholder="Escriba su nombre completo">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Apellidos:</label>
                <input type="text" name="apellidos" class="form-control js-apellido" id="exampleFormControlInput1" required placeholder="Digite su apelliod completo">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Telefono:</label>
                <input type="text" name="telefono" class="form-control js-telefono" id="exampleFormControlInput1" required placeholder="Digite un numero de telefono">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Direccion:</label>
                <input type="text" name="direccion" class="form-control js-direccion" id="exampleFormControlInput1" required placeholder="Escriba su direccion">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Usuario:</label>
                <input type="text" name="usuario" class="form-control js-usuario" id="exampleFormControlInput1" required placeholder="Escriba un nombre usuario">
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Contraseña:</label>
                <input type="text" name="pass" class="form-control js-pass1" id="exampleFormControlInput1" required placeholder="Ingrese una contraseña">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Verificar contraseña:</label>
                <input type="text" name="pass" class="form-control js-pass2" id="exampleFormControlInput1" required placeholder="Ingrese una contraseña">
            </div>
            

            <!--button type="submit" class="btn btn-primary">Guardar</button-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn js-createAcount btn-primary">Crear Cuenta</button>
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

<style>
  /* The Modal (background) */
.modal1 {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 0; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content1 {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 30%;
    height: 250px;
}

/* The Close Button */
.close {
    
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

#myMensaje{
  color: #000;
  margin-top: 25px;
  font-size: 20px;
  text-align: justify;
}

#myMensaje1{
  color: #000;
  margin-top: 0px;
  font-size: 20px;
  text-align: justify;
}



.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.btnModal{
  margin-top: 10px;
}
</style>




<div id="myModal1" class="modal1">

  <!-- Modal content -->
  <div class="modal-content1">
  <p id="myMensaje1">Mensage !</p>

    <!--span class="close">&times;</span-->
    <p id="myMensaje">Las contraseñas insertadas no coinciden intente nuevamente</p>
    
    <center>
      <button class="btn btn-success btnModal" id="myBtnSi">Aceptar</button>
    </center>
  </div>

</div>



<script>

          $('.js-createAcount').on('click', function(){
             
              const pass1 = $('.js-pass1').val();
              const pass2 = $('.js-pass2').val();

            if(pass1 != pass2){
              //alert("las contraseña insertadas no coinciden");

              //eturn false;
              //$('#modalCrearCuenta').hide();
              $('.js-btnClose').click();
              $('#myModal1').show();
            }else{
              $('.js-createAcount').attr('type', 'submit');
            }
              
          });

          $('#myBtnSi').on('click', function(){
            $('#myModal1').hide();
          });

</script>
