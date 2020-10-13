<?php
    session_start();
  //  include 'conexion.php'; 
    if(!isset($_SESSION['carrito'])){header("Location: ./carrito.php");}
    $arreglocarrito = $_SESSION['carrito'];
     for($i=0;$i<count($arreglocarrito);$i++){

     }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <title>Dulzuras Valeria</title>
  </head>
  <body>
  
  <div class="site-wrap">
   <?php include '..\Libs\header.php'; ?> 

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Gracias!</h2>
            <p class="lead mb-5">Su pedido se completó correctamente.</p>
            <p><a href="http://localhost/prog3/" class="btn btn-sm btn-primary">Volver a Dulzuras Valeria</a></p>
          </div>
        </div>
      </div>
    </div>

    <!--Footer -->
    <?php include '../Libs/footer.php'; ?>
  </div>
</body>
</html>