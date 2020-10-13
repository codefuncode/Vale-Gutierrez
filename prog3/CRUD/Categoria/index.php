<?php
   include '..\Libs\header.php';
?>
<html>
<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1. shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Categorias</title>
</head>
<body>
    <!--BARRA DE NAVEGACION-->
<header>
</header>
    <!--TABLA DE CATEGORIAS-->
    <div class="container-fluid">
    <div class="row">
        <div><a href="create.php" class="btn btn-success btn-sm mb-2 ml-2"><i class="far fa-file"></i>Agregar</a></div>
        <?php
        $sql="Select * from categorias";
        $categorias= preparar_select($conexion,$sql);
        $campos=$categorias->fetch_fields();
        ?>
        <table class="table table-striped">
                <thead>
                    <?php
                        foreach($campos as $campo){
                            echo '<th>' .substr($campo->name,1).'</th>';
                        }
                        echo '<th>Acciones</th>';
                    ?>
                </thead>
                <tbody>
                    <?php 
                        foreach ($categorias as $fila) {
                            echo '<tr>';
                            foreach ($campos as $campo){
                            echo '<td>'.$fila[$campo->name].'</td>';
                            }
                        echo'<td><div class="d-flex flex-row">
                        <div class="p-1"><a href="update.php?iIdCategorias='.$fila["iIdCategorias"].'" class="btn btn-outline-primary btn-sm"><i class="far fa-edit"></i></a></div>';
                       echo'<div class="p-1"><a href="delete.php?iIdCategorias='.$fila["iIdCategorias"].'"class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></a></div>';
                     echo'<div class="p-1"><a href="productos.php?iIdCategorias='.$fila["iIdCategorias"].'"class="btn btn-outline-secondary btn-sm"><i class="fas fa-file-medical"></i></a></div>';
                      '<div class="p-1"><a href="#" class="btn btn-outline-info btn-sm"><i class="fas fa-user-secret"></i>Auditoria</a></div></div></td></tr>';
                        }
                    ?>
            </tbody>
        </table>
    </div>
<!-- FOOTER -->
<?php
    include '..\Libs\footer.php';
?>
</body>
</html>

