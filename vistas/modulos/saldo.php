<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Tablero
      
      <small>Panel de Control</small>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Saldo</a></li>
      
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
           
          <div class="box box-success">

             <div class="box-header">

              <center>

             <h1>Saldo</h1>

             <?php
             $saldo=ControladorCuenta::ctrConsultarSaldo($_SESSION["numero"]);
                    echo '<h2>'.number_format($saldo[0] ,2).'</h2>';

             ?>
           

              </center>

             </div>

             </div>

         </div>

         <div class="col-lg-12">
           
          <div class="box box-primary">

             <div class="box-header">

              <center>

             <a href="inicio" class="btn btn-primary btn-lg" style="padding: 20px;">Volver</a>

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
