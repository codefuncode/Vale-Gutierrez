<?php
  session_start();
  include '..\Libs\header.php'; 
?>
<div class="card-deck">
  <?php
  $sql="select pi.*,i.sNombreArchivo,i. sPath from Productos p inner join Producto_Imagen pi on p.iIdProductos=pi.iIdProductos inner join Imagenes i on pi.iIdImagenes=i.iIdImagenes";
  $productos=preparar_select($conexion,$sql);
  foreach ($productos as $producto){
  ?>
  <div class="card">
    <img src="/prog3/CRUD/Imagenes/<?php echo $producto["sNombreArchivo"];?>" class="card-img-top" alt="..." style="height:32px; width:32px;display:block;">
    <div class="card-body">
      <h5 class="card-title"><?php echo $producto["sNombre"];?></h5>
      <p class="card-text"><?php echo $producto["sDescripcion"];?></p>
    </div>
    <div class="card-footer">
      <p><?php echo $producto["fPrecio"];?></p>
      <div class="input-group mb_0">
        <input class="form-control form-control-sm" type="number" min="1" name="iCantidad">
        <div class="input-group-prepend">
          <a href="CRUD/Agregar.php" class="btn btn-outline-dark btn-sm"><i class="fas fa-shopping-cart"></i>Añadir</a>
        </div>
      </div>
    </div>
    </div>
  <?php
    }
  ?>
</div>
<?php
  include '..\Libs\footer.php';
?>
