<?php
    session_start(); 
    include "..\Libs\header.php";
?>
<body >
<?php
    if(isset($_SESSION["iIdUsuarios"])){
       header("Location:index.php");
    }
    if(!empty($_POST))
    {
        $usuario= $conexion->real_escape_string ($_POST['txtUsuario']);
        $contraseña=$conexion->real_escape_string($_POST['txtContraseña']);
        
            $sql="SELECT * FROM usuarios where sLogin=?";
            $datos=preparar_select($conexion,$sql,[$usuario]);
            if($datos->num_rows>0){
                $fila = $datos->fetch_assoc();
                if($contraseña==$fila["sClave"]){
                    $_SESSION["iIdUsuarios"]=$fila["iIdUsuarios"];
                    $_SESSION["sLogin"]=$fila["sLogin"];
                    $_SESSION["isVale"]=1;
                    $_SESSION["sNombre"]=$fila["sNombre"];
                    $_SESSION["sApellido"]=$fila["sApellido"];
                    header ("location:/prog3/index.php");
                }else{
                    $mje="Contraseña Incorrecta";
                    }
            }else{
        $mje="Usuario Incorrecto";
        }
    }
?>
<html>
<head>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php
        if(!empty($mje)){
            echo "<p>" .$mje. "</p>";
        } 
    ?>
<div class="overlay">
<!-- FORMULARIO DE INGRESO  -->
<form id="loginform" role="form" action="loginsession.php" method="POST">
   <div class="con">
   <header class="head-form">
      <h2>LOGIN</h2>
      <p>Inicie sesión aquí con su nombre de usuario y contraseña</p>
   </header>
   <br>
   <div class="field-set">
      <!--   NOMBRE DE USUARIO -->
         <span class="input-item">
           <i class="fa fa-user-circle"></i>
         </span>
         <input class="form-input" type="text" name="txtUsuario" id="txtUsuario" placeholder="Usuario" required>
      <br>

           <!-- CONTRASEÑA -->
      <span class="input-item">
        <i class="fa fa-key"></i>
       </span>
      <input class="form-input" type="password" name="txtContraseña" id="txtContraseña" placeholder="Contraseña" required>

      <br>
<!-- BOTONES  -->
      <button class="log-in">Iniciar sesión</button>
   </div>

   <div class="other">

      <button class="btn submits frgt-pass">Olvidé mi contraseña</button>

      <a role="button" class="btn submits sign-up" href="registrarse.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Registrarse </a>
   </div>
  </div>
</form>
</div>

</body>
</html>
