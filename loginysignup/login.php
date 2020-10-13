<?php
session_start();
include "..\Libs\header.php";
?>
<body>
  <?php
if (isset($_SESSION["iIdUsuarios"])) {
    header("Location:index.php");
}
if (!empty($_POST)) {
    $usuario = $conexion->
        real_escape_string($_POST['txtUsuario']);
    $contraseña = $conexion->real_escape_string($_POST['txtContraseña']);

    $sql   = "SELECT * FROM usuarios where usuario=?";
    $datos = preparar_select($conexion, $sql, [$usuario]);
    if ($datos->num_rows > 0) {
        $fila = $datos->fetch_assoc();
        if ($contraseña == $fila["clave"]) {
            $_SESSION["iIdUsuarios"] = $fila["iIdUsuarios"];
            $_SESSION["usuario"]     = $fila["usuario"];
            $_SESSION["isVale"]      = 1;
            $_SESSION["sNombre"]     = $fila["sNombre"];
            $_SESSION["sApellido"]   = $fila["sApellido"];
            header("location:/prog3/index.php");
        } else {
            $mje = "Contraseña Incorrecta";
        }
    } else {
        $mje = "Usuario Incorrecto";
    }
}
?>
  <html>
    <head>
      <link href="estilo.css" rel="stylesheet"/>
    </head>
    <body>
    <?php
if (!empty($mje)) {
    echo "<p>" . $mje . "</p>";
}
?>
    </body>
  </html>
</body>
<div class="overlay">
  <!-- FORMULARIO DE INGRESO  -->
  <form action="loginsession.php" id="loginform" method="POST" role="form">
    <div class="con">
      <header class="head-form">
        <h2>
          LOGIN
        </h2>
        <p>
          Inicie sesión aquí con su nombre de usuario y contraseña
        </p>
      </header>
      <br/>
      <div class="field-set">
        <!--   NOMBRE DE USUARIO -->
        <span class="input-item">
          <i class="fa fa-user-circle">
          </i>
        </span>
        <input class="form-input" id="txtUsuario" name="txtUsuario" placeholder="Usuario" required="" type="text"/>
        <br/>
        <!-- CONTRASEÑA -->
        <span class="input-item">
          <i class="fa fa-key">
          </i>
        </span>
        <input class="form-input" id="txtContraseña" name="txtContraseña" placeholder="Contraseña" required="" type="password"/>
        <br/>
        <!-- BOTONES  -->
        <button class="log-in">
          Iniciar sesión
        </button>
      </div>
      <div class="other">
        <button class="btn submits frgt-pass">
          Olvidé mi contraseña
        </button>
        <a class="btn submits sign-up" href="registrarse.php" role="button">
          <i aria-hidden="true" class="fa fa-user-plus">
          </i>
          Registrarse
        </a>
      </div>
    </div>
  </form>
</div>
