<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Tablero
      
      <small>Panel de Control</small>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tablero</li>
    
    </ol>

  </section>

  <section class="content">

     <div class="row">
       
    
         <div class="col-lg-12">
           
          <?php

             echo '<div class="box box-success">

             <div class="box-header">

             <h1>Bienvenid@, seleccione una opción para continuar</h1> Última entrada '.$_SESSION["ultimo_login"] .'

             </div>

             </div>';

         

          ?>

         </div>


     </div>


     <div class="row">
       
    
         <div class="col-lg-12">
           
          <div class="box box-primary">

             <div class="box-header">

              <center>

             <a href="saldo" role="button" class="btn btn-primary btn-lg" style="padding: 20px;">Consultar saldo</a>
           

              </center>

             </div>

             </div>

         </div>

         <div class="col-lg-12">
           
          <div class="box box-primary">

             <div class="box-header">

              <center>

             <button data-toggle="modal" data-target="#modalTransferencia" class="btn btn-primary btn-lg" style="padding: 20px;">Transferencia</button>

              </center>

             </div>

             </div>

         </div>

          <div class="col-lg-12">
           
          <div class="box box-danger">

             <div class="box-header">

              <center>

             <a href="salir" class="btn btn-danger btn-lg" style="padding: 20px;">Cancelar</a>

              </center>

             </div>

             </div>

         </div>

     </div>





  </section>
 
</div>



<!--=====================================
MODAL TRANSFERENCIA
======================================-->

<div id="modalTransferencia" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Realizar Transferencia</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NUMERO DE CUENTA A TRANSFERIR-->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="number" class="form-control input-lg" name="numero" placeholder="Número de cuenta a transferir" id="numero" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL MONTO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-money"></i></span> 

                <input type="number" class="form-control input-lg" name="monto" placeholder="Digite el monto" required>

              </div>

            </div>


            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="contrasena" placeholder="Ingresar contraseña" required>

              </div>

            </div>

  

  

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Aceptar</button>

        </div>

        <?php

          $transferencia = new ControladorCuenta();
          $transferencia -> ctrTransferencia();

        ?>

      </form>

    </div>

  </div>

</div>
