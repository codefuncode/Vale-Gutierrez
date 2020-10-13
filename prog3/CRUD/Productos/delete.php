<?php
 session_start();
 include '..\Libs\header.php';
?>
<?php
 if(!empty($_GET["iIdProductos"])) {
    $iIdProductos=$_GET["iIdProductos"];
    $sql="update productos set bEliminado=1 where iIdProductos=?";
    $cmd=preparar_query($conexion,$sql,[$iIdProductos]);
    if($cmd){
        echo '<script text="text/javascript">alert("Producto Eliminado Correctamente")</script>';
        header("location: index.php");
    }else{
        echo "Error:" .$sql . "" . $cmd->error;
    }
}
?>
<?php
 include '..\Libs\footer.php';
?>