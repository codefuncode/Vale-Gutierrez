<?php
  session_start();
  include '..\Libs\header.php'; 

  if(isset($_GET["producto_id"]) && $_GET["producto_id"] != "")
    die("Id del producto: " . intval($_GET["producto_id"]));
?>
<div class="card-deck">
<?php
  $sql="select pi.*,i.sNombreArchivo,i. sPath from Productos p inner join Producto_Imagen pi on p.iIdProductos=pi.iIdProductos inner join Imagenes i on pi.iIdImagenes=i.iIdImagenes";
  $productos=preparar_select($conexion,$sql);
  foreach ($productos as $producto){
?>
<body background=/prog3/CRUD/Imagenes/fondo.jpg>
    <!--BARRA DE NAVEGACION-->
<header>
</header>
    <!--TABLA DE PRODUCTOS-->
<div class="container-fluid">
<div class="row">
<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-interval="10000">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item" data-interval="2000">
      <img src="..." class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- FOOTER -->
<?php
    }
  ?>
</div>
<?php
  include '..\Libs\footer.php';
?>