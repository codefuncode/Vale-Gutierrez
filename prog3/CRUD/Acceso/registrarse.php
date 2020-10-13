<?php
    session_start(); 
    include "..\Libs\header.php";
    include "..\Libs\conexion.php";
?>
<?php
if(isset($_SESSION["iIdUsuarios"])){
    header("Location:index.php");
 }
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $usuario = $_POST['txtUsuario'];
  $contraseña = $_POST['txtContraseña'];
  $contraseña2 = $_POST['txtContraseña2'];

  $contraseña = hash('sha512',$contraseña);
  $contraseña2 = hash('sha512',$contraseña2);

  $error = '';
  if (empty($usuario) or empty($contraseña) or empty($contraseña2)){
    $error .= '<i>Por favor rellenar todos los campos</i>';
  }else{
     try{
      $conexion=new mysqli ('127.0.0.1','root','12345678','dbCompraEnSalta');
    }catch (mysqli $conexion){
      echo 'Error al conectarse a MySQL: ', $conexion;
    }
    $statement="SELECT * FROM usuarios where sLogin=?";
    $datos=preparar_select($conexion,$sql,[$usuario]);
    if($datos->num_rows>0){
        $fila = $datos->fetch_assoc();
        if($fila != false){
          $error .='<i>Este usuario ya existe</i>';
        }
        if($contraseña != $contraseña2){
          $error .='<i>Las contraseñas no coinciden</i>';
        }
    }
    if($error == ''){
      $statement = $conexion->prepare('INSERT INTO usuarios (sLogin,sClave) VALUES (:sLogin,:sClave)');
      $statement->execute(array(
        ':sLogin'=>$usuario,
        ':sClave'=>$contraseña
      ));
      $error .= '<i style="color:green;"Usuario registrado exitosamente></i>';
    }
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

<!-- FORMULARIO DE REGISTRO  -->
<form id="loginform" role="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
   <div class="con">
   <header class="head-form">
      <h2>REGISTRO</h2>
      <p>Por favor complete este formulario para crear una cuenta</p>
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
    <span class="input-item">
    <i class="fa fa-key"></i>
    </span>
    </span>
      <input class="form-input" type="password" name="txtContraseña2" id="txtContraseña" placeholder="Confrimar contraseña" required>
 
<!-- BOTONES  -->
<button class="Sign-up">Registrarse</button>
   </div>
   </div>
</form>
</div>
</body>
</html>