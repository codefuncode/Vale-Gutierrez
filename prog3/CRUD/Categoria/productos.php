<?php
   include '..\Libs\header.php';
?>
<?php
if(!empty($_GET["iIdCategorias"])){          nbbvfdxsd
    $iIdCategorias=$_GET["iIdCategorias"];
    }else{
        if(!empty($_POST)){
            $iIdCategorias=$_POST["iIdCategorias"];
            $sql='insert into Producto_categoria(iIdCategorias,iIdProductos) values(?,?)';
        
            foreach($_POST['ids'] as $iid){
                $cmd=preparar_query($conexion,$sql,[$iIdCategorias,$iid]);
            }
        }
    }
    $sql="Select iIdProductos,sNombre,sDescripcion,fPrecio from productos";
    $productos= preparar_select($conexion,$sql);
    $campos=$productos->fetch_fields();
?>
<form id="productocategoriaform" action="productos.php" method="POST">
<input type="hidden" name="iIdCategorias" value="<?php echo $iIdCategorias;?>">


<div class="table-responsive">
    <table class="table table-striped">
                <thead>
                <th>Seleccion</th>
                    <?php
                        foreach($campos as $campo){
                            echo '<th>' .substr($campo->name,1).'</th>';
                        } 
                    ?>
                </thead>
                <tbody>
                    <?php 
                    foreach ($productos as $fila) {
                            echo '<tr>';
                            echo '<td><input type="checkbox" name="iIdCategorias" name="ids[]" value="'.$fila["iIdProductos"].'"></td>';
                            foreach ($campos as $campo){
                            echo '<td>'.$fila[$campo->name].'</td>';
                            }
                        echo'</tr>';
                        }
                      
                    ?>
            </tbody>
    </table>
</div>
    <input type="submit" value="Guardar">    
</form>
<?php
    include '..\Libs\footer.php';
?>