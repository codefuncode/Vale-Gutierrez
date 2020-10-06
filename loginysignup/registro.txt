<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    session_start(); 
    include "..\Libs\header.php";
    include "..\Libs\conexion.php";
?>
<?php
if(isset($_SESSION["usuario"])){
    header("Location:index.php");
 }
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $usuario = $_POST['txtUsuario'];
  $clave = $_POST['txtContraseña'];
  $clave2 = $_POST['txtContraseña2'];

  $clave = hash('sha512',$clave);
  $clave2 = hash('sha512',$clave2);

  $error = '';
  if (empty($usuario) or empty($clave) or empty($clave2)){
    $error .= '<i>Por favor rellenar todos los campos</i>';
  }else{
     try{
      $conexion = new PDO('mysql:host=127.0.0.1;dbname=dbCompraEnSalta','root','12345678');
    }catch(PDOException $prueba_error){
      echo "Error: " . $prueba_error->getMessage();
  }
  
  $statement = $conexion->prepare('SELECT * FROM registros WHERE usuario = :usuario LIMIT 1');
  $statement->execute(array(':usuario' => $usuario));
  $resultado = $statement->fetch();
  

  if ($resultado != false){
      $error .= '<i>Este usuario ya existe</i>';
  }
  
  if ($clave != $clave2){
      $error .= '<i> Las contraseñas no coinciden</i>';
  }
  
  
}

if ($error == ''){
  $statement = $conexion->prepare('INSERT INTO registros (id, usuario, clave) VALUES (null,:usuario, :clave)');
  $statement->execute(array(
      
      ':usuario' => $usuario,
      ':clave' => $clave
      
  ));
  
  $error .= '<i style="color: green;">usuario registrado exitosamente</i>';
  }
}
?>
<html>
<head>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php
        if(!empty($error)){
            echo "<p>" .$error. "</p>";
        } 
    ?>
<div class="overlay">

<!-- FORMULARIO DE REGISTRO  -->
<form id="loginform" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
   <div class="con">
   <header class="head-form">
      <h2>REGISTRO</h2>
      <p>Por favor complete este formulario para crear una cuenta</p>
   </header>
   <br>
   <div class="field-set">
      <!--   NOMBRE DE usuario -->
         <span class="input-item">
           <i class="fa fa-user-circle"></i>
         </span>
         <input class="form-input" type="text" name="txtUsuario" id="txtUsuario" placeholder="usuario" required>
      <br>

           <!-- clave -->
    <span class="input-item">
    <i class="fa fa-key"></i>
    </span>
      <input class="form-input" type="password" name="txtContraseña" id="txtContraseña" placeholder="clave" required>
    <br>
    <span class="input-item">
    <i class="fa fa-key"></i>
    </span>
    </span>
      <input class="form-input" type="password" name="txtContraseña2" id="txtContraseña" placeholder="Confrimar clave" required>
 
<!-- BOTONES  -->
<button type="submit">Registrarse</button>
   </div>
   </div>
</form>
</div>
</body>
</html>