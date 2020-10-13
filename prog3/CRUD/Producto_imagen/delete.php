<?php
 session_start();
 include '..\Libs\header.php';
 ?>
 <?php
    if(!empty($_GET["iIdProducto_Imagen"])) {
        $iIdProducto_Imagen=$_GET["iIdProducto_Imagen"];
        $iIdImagenes=$_GET["iIdImagenes"];
        $iIdProductos=$_GET["iIdProductos"];
        $sql="update producto_imagen set bEliminado=1 where iIdProducto_Imagen=?";
        $cmd=preparar_query($conexion,$sql,[$iIdProducto_Imagen]);
        if($cmd){
            $sql="update Imagenes set bEliminado=1 where iIdImagenes=?";
            $cmd=preparar_query($conexion,$sql,[$iIdImagenes]);
            header("location: ../Productos/imagenes.php?iIdProductos=$iIdProductos");
        }
    }
?>
<?php
 include '..\Libs\footer.php';
?>