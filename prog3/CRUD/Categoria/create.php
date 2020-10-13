<?php
  session_start();
  include '..\Libs\header.php';
?>
<?php
  if(!empty($_POST)) {
    $sNombre=$_POST["txtsNombre"];
    $sDescripcion=$conexion->real_escape_string($_POST["sDescripcion"]);
    //sql insertar
    $sql="INSERT INTO categorias(sNombre,sDescripcion,dFechaAlta) VALUES (?,?,NOW())";
    $cmd=preparar_query($conexion,$sql,[$sNombre,$sDescripcion]);
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
        <div class="card-header"><a href="index.php" class="btn btn-success btn-sm mb-2 ml-2"><i class="far fa-file"></i>Agregar categoria(Volver a la lista de categorias)</a></div>
          <div class="card-body"><form id="createform" class="form-horizontal" role="form" action="create.php" method="post"></div>
              <div class="form-group row">
                <label for="txtsNombre" class="col-sm-4 col-form-label text-md-right">Nombre</label>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="txtsNombre" id="txtsNombre">
                </div>
              </div>
              <div class="form-group row">
                <label for="sDescripcion" class="col-sm-4 col-form-label text-md-right">Descripcion</label>
                <div class="col-md-6">
                  <textarea cols="100" rows="4" class="form-control" name="sDescripcion"  id="sDescripcion"></textarea>
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