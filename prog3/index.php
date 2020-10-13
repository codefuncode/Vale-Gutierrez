<?php
session_start();
include 'CRUD/Libs/header.php';
?>
<?php
include 'CRUD/Libs/menuBuscar.php';
include 'CRUD/Libs/menuCategoria.php';
?>
<head><link rel="stylesheet" href="./CRUD/estilo.css"></head>
<body>
    <?php
    if (!empty($_GET["iIdCategorias"])) {
      $iIdCategorias = $_GET["iIdCategorias"];
      $sql = "select p.*,i.sNombreArchivo,i.sPath from Productos p inner join Producto_Imagen pi on p.iIdProductos=pi.iIdProductos inner join Imagenes i on pi.iIdImagenes=i.iIdImagenes inner join Producto_categoria pc on p.iIdProductos=pc.iIdProductos where pc.iIdCategorias=? ";
      $productos = preparar_select($conexion, $sql, [$iIdCategorias,]);
    } else {
      $sql = "select p.*, 
  (select i.sNombreArchivo from producto_imagen  pi 
    inner join Imagenes i on pi.iIdImagenes=i.iIdImagenes
    where p.iIdProductos=pi.iIdProductos limit 1,1)  as sNombreArchivo,
      (select i.sPath  from producto_imagen  pi 
          inner join Imagenes i on pi.iIdImagenes=i.iIdImagenes
    where p.iIdProductos=pi.iIdProductos limit 1,1)  as sPath
from Productos p ";
      $productos = preparar_select($conexion, $sql);
    }

    ?>
    <div class=" container row card-check col-md-12 p-1">
    <?php

    foreach ($productos as $producto) {
    ?>

      <div class="card col-md-3 p-5">
        <a href="CRUD/Carrito/Productos.php?producto_id=<?php echo $producto['iIdProductos']; ?>">
          <img src="\prog3\CRUD\Imagenes\<?php echo $producto["sNombreArchivo"]; ?>" class="card-img-top" alt="..." style="height: 100px;width: 100px;display:block";>
          </a>
          <div class="card-body">
            <h5 class="card-title"  style="color:#DC143C">&nbsp;<?php echo $producto["sNombre"]; ?></h5>
            <p class="card-text"  style="color:	#DC143C">&nbsp;<?php echo $producto["sDescripcion"]; ?></p>
          </div>
          <div class="card-footer">
            <p font style="color:	#8B0000">&nbsp;$<?php echo $producto["fPrecio"]; ?></p>
          
              <div class="input-group-prepend">
                <a href="CRUD/Carrito/Productos.php?producto_id=<?php echo $producto['iIdProductos']; ?>" 
                  class="btn btn-outline-dark btn-sm">Ver detalles</a>
              </div>
            
          </div>
       
      </div>
    <?php
    }
    ?>
</div>

</body>
<?php
include 'CRUD/Libs/footer.php';
?>