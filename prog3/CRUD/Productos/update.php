<?php 
 session_start();
 include '..\Libs\header.php';
 ?>
 <?php
    if(!empty($_GET["iIdProductos"])){
        $iIdProductos=$_GET["iIdProductos"];
        $sql="select * from productos where iIdProductos=?";
        $datos=preparar_select($conexion,$sql,[$iIdProductos]);
        if($datos->num_rows>0){
          $fila=$datos->fetch_assoc();
        }
    }else{
    if(!empty($_POST)){
        $iIdProductos=$conexion->real_escape_string($_POST["iIdProductos"]);
        $sCodigo=$conexion->real_escape_string($_POST["txtsCodigo"]);
        $sNombre=$conexion->real_escape_string($_POST["txtsNombre"]);
        $sDescripcion=$conexion->real_escape_string($_POST["txtsDescripcion"]);
        $fPrecio=$conexion->real_escape_string($_POST["txtsPrecio"]);
        $iStock=$conexion->real_escape_string($_POST["txtsStock"]);
        $iStockMinimo=$conexion->real_escape_string($_POST["txtsStockMinimo"]);
        //$dFecha=$conexion->real_escape_string($_POST["txtsFecha"]);
        //$bEliminado=$conexion->real_escape_string($_POST["txtsEliminado"]);
        //$bPublicado=$conexion->real_escape_string($_POST["txtsPublicado"]);

        //sql insertar
        $sql="update productos set sCodigo=?,sNombre=?,sDescripcion=?,fPrecio=?,iStock=?,iStockMinimo=?,dFecha=now(),bEliminado=0,bPublicado=1";
        $cmd=preparar_query($conexion,$sql,[$sCodigo,$sNombre,$sDescripcion,$fPrecio,$iStock,$iStockMinimo]);
        if($cmd){
            header("location:index.php");
        }
    }
}
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8"> 
      <div class="card">
      <div class="card-header"><a href="index.php" class="btn btn-success btn-sm mb-2 ml-2"><i class="far fa-file"></i>Agregar producto(Volver a la lista de productos)</a></div>
          <div class="card-body"><form id="createform" class="form-horizontal" role="form" action="create.php" method="post"></div>
            <div class="form-group row">
            <label for="txtsCodigo" class="col-sm-4 col-form-label text-md-right">Codigo</label>
              <div class="col-md-6">
                <input type="text" class="form-control " name="txtsCodigo" id="txtsCodigo" value=<?php echo $fila["sCodigo"];?>>
              </div>
              </div>
              <div class="form-group row">
                <label for="txtsNombre" class="col-sm-4 col-form-label text-md-right">Nombre</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="txtsNombre" id="txtsNombre" value=<?php echo $fila["sNombre"];?>>
                </div>
              </div>
              <div class="form-group row">
                <label for="sDescripcion" class="col-sm-4 col-form-label text-md-right">Descripcion</label>
                <div class="col-md-6">
                  <textarea cols="100" rows="4" class="form-control" name="txtsDescripcion"  id="sDescripcion" ><?php echo $fila["sDescripcion"];?></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="fPrecio" class="col-sm-4 col-form-label text-md-right">Precio</label>
                <div class="col-md-6">
                  <input type="number"  step="any" class="form-control" name="txtfPrecio"  id="fPrecio" value=<?php echo $fila["fPrecio"];?> >
                </div>
              </div>
              <div class="form-group row">
                <label for="iStock" class="col-sm-4 col-form-label text-md-right">Stock</label>
                <div class="col-md-6">
                  <input type="number"class="form-control" name="txtiStock"  id="iStock" value=<?php echo $fila["iStock"];?> >
                </div>
              </div>
              <div class="form-group row">
                <label for="iStockMinimo" class="col-sm-4 col-form-label text-md-right">Stock Minimo</label>
                <div class="col-md-6">
                  <input type="number"  class="form-control" name="txtiStockMinimo"  id="txtiStockMinimo" value=<?php echo $fila["iStockMinimo"];?> >
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">Grabar</button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  include '..\Libs\footer.php';
?>