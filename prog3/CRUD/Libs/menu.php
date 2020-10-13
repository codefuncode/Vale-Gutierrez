<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark"  display: flex; justify-content: space-beetwen;>
    <a class="navbar-brand" href="/prog3/"><div class="d-none d-sm-block">Ahora podes comprar aqui en Dulzuras Valeria</div><div class="d-block d-sm-none">Dulzuras Valeria</div></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
  
<nav class="navbar navbar-light bg-right">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
</nav>
  <!-- Carrito -->
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav navbar-right">
        <li class="nav-item">
              <a class="navbar-brand" href="/prog3/CRUD/Carrito/carrito.php" >
          <i class="fas fa-shopping-cart"></i>
            <span class="count">
            <?php
              if(isset($_SESSION['carrito'])){
                  echo count($_SESSION['carrito']);
                }else{
                      echo 0;
                    }
              ?>
            </span>
        </a>
        </li>     
<!-- Iniciar Sesion -->
          <?php if (!isset($_SESSION["iIdUsuarios"])) { ?>
            <li class="nav-item active">
              <a class="nav-link" href="CRUD\Acceso\loginsession.php"><i class="far fa-user mr-2"></i>Iniciar Sesión</a>
            </li>
          <?php }else{ ?>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo '<i class="fas fa-user-circle"></i>'. $_SESSION["sLogin"]; ?>
        </a>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#"><i class="fas fa-user"></i>Mi cuenta</a>
        
          <?php
          ?>
          <a class="dropdown-item" href="#"><i class="fas fa-file-alt"></i>Mis órdenes</a>
          <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="CRUD\Acceso\logout.php"><i class="fas fa-sign-out-alt"></i>Cerrar Sesión</a>
        </div>
      </li>
          <?php } ?>
      </ul>
    </div>
</nav>