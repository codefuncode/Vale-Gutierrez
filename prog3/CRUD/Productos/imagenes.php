<?php 
  session_start();
  include '..\Libs\header.php';
?>
<?php
  if(!empty($_GET["iIdProductos"])){
  $iIdProductos=$_GET["iIdProductos"];
  }else{
    if(!empty($_POST)){
    $iIdProductos=$_POST["iIdProductos"];
    $iOrden=$_POST["txtiOrden"];
    $sNombreArchivo=$_FILES["fileimagen"]["name"];
    $sTipoExtension=$_FILES["fileimagen"]["type"];
    //move el archivo de lugar temporal al destino,sistema.
    $sPath=$_SERVER["DOCUMENT_ROOT"]."/prog3/CRUD/Imagenes";
    //moverlo
    move_uploaded_file($_FILES["fileimagen"]["tmp_name"],$sPath. '/' .$sNombreArchivo);
    //Grabar en la BD
    $sql="insert into imagenes(sNombreArchivo,sTipoExtension,sPath,bEliminado) values (?,?,?,0)";
    $cmd=preparar_query($conexion,$sql,[$sNombreArchivo,$sTipoExtension,$sPath]);
    if($cmd){
    $iIdImagenes=$cmd->insert_id;
    $sql="insert into producto_imagen(iIdProductos,iIdImagenes,iOrden,bEliminado) values (?,?,?,0)";
    $cmd=preparar_query($conexion,$sql,[$iIdProductos,$iIdImagenes,$iOrden]);
    }
  }
}
  $sql="select pi.*,i.sNombreArchivo from producto_imagen pi inner join imagenes i on pi.iIdImagenes=i.iIdImagenes where i.bEliminado=0 and pi.iIdProductos=?";
  $imagenes=preparar_select($conexion,$sql,[$iIdProductos]);
?>
<div>Agregar Imagen Producto <a href="/prog3/CRUD/Productos/index.php">(Volver a la lista de productos)</a></div>
 <form id="imagenesform" class="form-horizontal" role="form" action="imagenes.php" method="POST" enctype="multipart/form-data" >
    <input type="hidden" name="iIdProductos" id="iIdProductos" value="<?php echo $iIdProductos; ?>">
  <div class="form-group row">
    <label for="fileimagen" class="col-2">Imagen</label>
    <div class="col">
        <input type="file" class="form-control form-control-sm" name="fileimagen" id="fileimagen">
    </div>
  </div>
  <div class="form-group row">
    <label for="txtiOrden" class="col-2">Orden</label>
    <div class="col-2">
        <input type="number" class="form-contro form-control-sm" name="txtiOrden" id="txtiOrden">
    </div>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Agregar imagen al producto</button>
  </div>
 </form>
 <div class="table-responsive">
   <table class="table table-striped" >
     <thead>
        <th>Imagen</th>
        <th>Nombre</th>
        <th>Orden</th>
        <th>Acciones</th>
     </thead>
    <tbody>
      <?php
      if($imagenes->num_rows > 0){
        foreach($imagenes as $imagen){
        echo '<tr><td><img src="/prog3/CRUD/Imagenes/'.$imagen["sNombreArchivo"].'"width="32px" height="32px"></td>
        <td>'.$imagen["sNombreArchivo"].'</td>
        <td>'.$imagen["iOrden"].'</td> 
        <td><a href="../Producto_Imagen/delete.php?iIdProducto_Imagen='.$imagen["iIdProducto_Imagen"].'&iIdImagenes='.$imagen["iIdImagenes"].'&iIdProductos='.$imagen["iIdProductos"].'" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></td></tr>';
        }
      }
      ?>
    </tbody>
  </table>
</div>
<?php
  include '..\Libs\footer.php';
?>