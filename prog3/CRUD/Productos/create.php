<?php
  session_start();
  include '..\Libs\header.php';

?>
<?php
  if(!empty($_POST["txtsCodigo"])) {
    $sCodigo=$conexion->real_escape_string($_POST["txtsCodigo"]);
    $sNombre=$conexion->real_escape_string($_POST["txtsNombre"]);
    $fPrecio=$conexion->real_escape_string($_POST["txtfPrecio"]);
    $sDescripcion=$conexion->real_escape_string($_POST["txtsDescripcion"]);
    $iStock=$conexion->real_escape_string($_POST["txtiStock"]);
    $iStockMinimo=$conexion->real_escape_string($_POST["txtiStockMinimo"]);
    //sql insertar
    $sql="INSERT INTO productos(sCodigo,sNombre,sDescripcion,fPrecio,iStock,iStockMinimo,dFecha,bEliminado,bPublicado) VALUES (?,?,?,?,?,?,NOW(), 1,0)";
    $cmd=preparar_query($conexion,$sql,[$sCodigo,$sNombre,$sDescripcion,$fPrecio,$iStock,$iStockMinimo]);
    if($cmd){
      header("Location:index.php");
    }else{
      $mje="Error:".$sql."</br>".$cmd->error;
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
                <input type="text" class="form-control " name="txtsCodigo" id="txtsCodigo">
              </div>
            </div>
              <div class="form-group row">
                <label for="txtsNombre" class="col-sm-4 col-form-label text-md-right">Nombre</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="txtsNombre" id="txtsNombre">
                </div>
              </div>
              <div class="form-group row">
                <label for="txtsDescripcion" class="col-sm-4 col-form-label text-md-right">Descripcion</label>
                <div class="col-md-6">
                  <textarea cols="100" rows="4" class="form-control" name="txtsDescripcion"  id="sDescripcion"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="txtPrecio" class="col-sm-4 col-form-label text-md-right">Precio</label>
                <div class="col-md-6">
                  <input type="number" step="any" cols="100" rows="4" class="form-control" name="txtfPrecio"  id="txtfPrecio"></input>
                </div>
              </div>
              <div class="form-group row">
                <label for="txtiStock" class="col-sm-4 col-form-label text-md-right">Stock</label>
                <div class="col-md-6">
                  <input cols="100" rows="4" class="form-control" name="txtiStock"  id="txtiStock"></input>
                </div>
              </div>
              <div class="form-group row">
                <label for="txtiStockMinimo" class="col-sm-4 col-form-label text-md-right">Stock Minimo</label>
                <div class="col-md-6">
                  <input cols="100" rows="4" class="form-control" name="txtiStockMinimo"  id="txtiStockMinimo"></input>
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