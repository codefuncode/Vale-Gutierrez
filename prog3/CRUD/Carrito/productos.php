<?php
  session_start();
  include '..\Libs\header.php';
?>
<?php
  include '..\Libs\menuBuscar.php';
?>
<head><link rel="stylesheet" href="/prog3/CRUD/estilo.css"></head>
<body>
<?php 
  $producto_id = (isset($_GET["producto_id"])) ? intval($_GET["producto_id"]) : die("Error al recibir el id del producto");
  $sql="SELECT * from Productos p where iIdProductos=$producto_id";
  $productos=preparar_select($conexion,$sql); 
  foreach ($productos as $producto)
?>
<h3>Productos</h3>
<fom>
<!-- Contenedor Principal -->
<div class="row">
  <!-- Contenedor Tarjeta -->
  <div class="col-md-12 row">
    <!-- Contenedor Imagenes -->
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12">
          <div id="carouselImgPrincipal" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <?php
                  $query = "SELECT i.sNombreArchivo,i.sPath FROM producto_imagen pi INNER JOIN Imagenes i on pi.iIdImagenes=i.iIdImagenes WHERE iIdProductos=$producto_id";
                  $img_productos=preparar_select($conexion,$query);
                  $contador = 0;
                  foreach($img_productos as $img){
              ?>
                <div class="carousel-item <?php echo $contador == 0 ? "active" : ""; ?>">
                  <img src="/prog3/CRUD/Imagenes/<?php echo html_entity_decode($img["sNombreArchivo"]) ?>" style="height: 370px;" class="d-block w-100 img-fluid">
                </div>
                <?php $contador++ ; ?>                
                  <?php } $contador; ?>
                  </div>
            <a class="carousel-control-prev" href="#carouselImgPrincipal" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselImgPrincipal" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Siguiente</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12">
        <h5 class="card-title"font style="color:#DC143C">&nbsp;<?php echo $producto["sNombre"];?></h5>
        <p class="card-text" font style="color:	#DC143C">&nbsp;<?php echo $producto["sDescripcion"];?></p>
        </div>
        <div class="col-md-6">
        <font style="color:	#8B0000">&nbsp;$<?php echo $producto["fPrecio"];?></font>
        </div>
        <div class="col-md-6">
        <p class="card-text" font style="color:	#DC143C">&nbsp; Disponibilidad en stock <br/> SKU#:#####</p>
        </div>
        <div class="col-md-12">
          <hr size="1">
        </div>
                
           
            <div class="input-group-prepend col-md-2" style="margin-top:5px;">
              <a style="min-width: 100px;" 
              href="http://localhost/prog3/crud/carrito/carrito.php?idproduct=<?php echo $producto_id;?>" 
              class="btn btn-outline-dark btn-sm"><i class="fas fa-shopping-cart"></i>  Añadir</a>
        </div>
                    
        </form>

      </div>
    </div>
  </div>
</div>

  <!--Footer -->
<?php
include '../Libs/footer.php';
?>
