<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
  <?php
  $sql="select * from categorias";
  $categorias=preparar_select($conexion,$sql);
  foreach ($categorias as $categoria){
    ?>
      <li class="nav-item active">
        <a class="nav-link" href="/prog3/index.php?iIdCategorias=<?php echo $categoria["iIdCategorias"];?>"><?php echo $categoria["sNombre"];?></span></a>
      </li>
    <?php } ?>
    </ul>
  </div>
</nav>