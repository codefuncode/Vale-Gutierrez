<?php
  session_start();
  if(!isset($arreglocarrito)){
   // header("Location: ./cobrar.php");
  }
  $arreglocarrito = $_SESSION['carrito'];
?>
<!DOCTYPE html>
<html lang="en">
  <head><title>Finalizar compra</title></head>
  <body>
  <div class="site-wrap">
    <?php include '..\Libs\header.php'; ?> 
    <form action="cobrar.php" method="GET">
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
           <div class="border p-4 rounded" >
            </div>
            <h3>FINALIZAR COMPRA</h3>
          </div>
        </div>
    <!--Resumen de compra -->
    <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-12">
                <h2>Resumen de Compra</h2>
                <div class="card card-body">
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Productos</th>
                      <th>Cantidad</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                  <?php 
                      $total = 0;
                      for ($i=0;$i<count($arreglocarrito);$i++) {
                        $total = $total + ($arreglocarrito[$i]['fPrecio'] * $arreglocarrito[$i]['cantidad']);
                  ?>  
                    <tr>
                      <td><?php echo $arreglocarrito[ $i] ['sNombre'];?></td>
                      <td><?php echo $arreglocarrito[ $i] ['cantidad'];?></td>
                      <td>$<?php echo number_format($arreglocarrito[$i]['fPrecio'],2, '.', '');?></td>
                    </tr>

                    <?php 
                     }
                    ?>
                    <tr>
                      <td>Totales</td>
                      <td>$ <?php echo number_format($total,2, '.', '');?></td>
                    </tr>
                    </tbody>
                  </table>
                </div>
                </div>
              </div>
            </div>
    </div>
    <!--Formulario-->
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
          <h2>1.Información Personal</h2>
          <!--- Formulario del cliente -->
          <div class="card card-body">
          <p>
            <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Formulario del cliente</button>
          </p>
         
            <div class="collapse" id="collapseExample">
            <div class="p-3 p-lg-5 border">
              <div class="form-group">
                <label for="provincia" class="text-black" >Provincia <span class="text-danger">*</span></label>
                <select id="provincia" class="form-control" name="provincia">
                  <option value="1">Seleccione un provincia</option>    
                  <option value="Buenos Aires">Buenos Aires</option>    
                  <option value="Catamarca">Catamarca</option>    
                  <option value="Chaco">Chaco</option>    
                  <option value="Chubut">Chubut</option>    
                  <option value="Córdoba">Córdoba</option>
                  <option value="Corrientes">Corrientes</option>
                  <option value="Entre Rios">Entre Rios</option>
                  <option value="Formosa">Formosa</option>
                  <option value="Jujuy">Jujuy</option>
                  <option value="La Pampa">La Pampa</option>
                  <option value="La Rioja">La Rioja</option>
                  <option value="Mendoza">Mendoza</option>
                  <option value="Misiones">Misiones</option>
                  <option value="Neuquén">Neuquén</option>
                  <option value="Rio Negro">Rio Negro</option>
                  <option value="Salta">Salta</option>
                  <option value="San Juan">San Juan</option>
                  <option value="San Luis">San Luis</option>
                  <option value="Santa Cruz">Santa Cruz</option>
                  <option value="Santa Fe">Santa Fe</option>
                  <option value="Santiago del Estero">Santiago del Estero</option>
                  <option value="Tierra del Fuego,Antártida e Isla del Atlántico Sur">Tierra del Fuego,Antártida e Isla del Atlántico Sur</option>
                  <option value="Tucumán">Tucumán</option>               
                </select>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="nombre" class="text-black">Nombre<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                </div>
                <div class="col-md-6">
                  <label for="apellido" class="text-black">Apellido<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="direccion" class="text-black">Dirección<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="codigopostal" class="text-black">Código Postal<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="codigopostal" name="codigopostal" placeholder="Código Postal">
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="correo" class="text-black">Correo Electrónico<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo electrónico">
                </div>
                <div class="col-md-6">
                  <label for="telefono" class="text-black">Teléfono<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono">
                </div>
                <button type="submit" class="btn btn-secondary my-1" id="btnEnviar" name="btnEnviar" value="Enviar formulario">Enviar</button>
              
              </div>
              </div>
            </div>
            </div>
            <!--- Domicilio de facturación -->
            <div class="card card-body">
            <p>
            <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">Domicilio de facturación</button>
            </p>
             
              <?php
                      if ($_GET['btnEnviar']){
                        echo "Provincia:".$_GET['provincia']."<br>";
                        echo "Nombre:".$_GET['nombre']."<br>";
                        echo "Apellido:".$_GET['apellido']."<br>";
                        echo "Código Postal:".$_GET['codigopostal']."<br>";
                        echo "Correo electrónico:".$_GET['correo']."<br>";
                        echo "Teléfono:".$_GET['telefono']."<br>";
                      }
              ?>
            </div>
          <!--Forma de envío -->
         
          <h2>2.Forma de envío</h2>
            <div class="custom-control custom-radio">
              <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
              <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Envio a domicilio $0</button>
              <body>
              <p>A domicilio de facturación.Envío entre los 3 y 7 días hábiles.</p>
              </body>
            </div>
          <button type="submit" class="btn btn-secondary my-1" id="btnSiguiente" name="btnSiguiente" value="Siguiente">Siguiente</button>
          
        <!--Forma de pago-->
        <h2>3.Forma de pago</h2>
        <div class="border p-3 mb-3">
        <div class="creditCardForm">
    <div class="heading">
    </div>
    <div class="payment">
        <form>
            <div class="form-group owner">
                <label for="owner">Titular de la tarjeta</label>
                <input type="text" class="form-control" id="owner">
            </div>
            <div class="form-group" id="card-number-field">
                <label for="cardNumber">Número de la tarjeta</label>
                <input type="text" class="form-control" id="cardNumber">
            </div>
            <div class="form-group CVV">
                <label for="cvv">Código de la tarjeta</label>
                <input type="text" class="form-control" id="cvv">
            </div>
            <div class="form-group" id="expiration-date">
                <label for="owner">Fecha de vencimiento</label>
                <select>
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
                <select>
                    <option value="21"> 2021</option>
                    <option value="20"> 2022</option>
                    <option value="21"> 2023</option>
                    <option value="20"> 2024</option>
                    <option value="21"> 2025</option>
                    <option value="20"> 2026</option>
                </select>
            </div>
            <div class="form-group" id="credit_cards">
                <img src="\prog3\CRUD\Imagenes\visa.jpg" style="height:50px;width:50px;" id="visa">
                <img src="\prog3\CRUD\Imagenes\mastercard.png" style="height:50px;width:50px;" id="mastercard">
            </div>
                <!-- button type="submit" class="btn btn-primary btn-lg py-3 btn-block" id="confirm-purchase"  onclick="window.location='./thankyou.php'">Pagar y finalizar compra</button-->
              
            <div class="form-group" id="pay-now">
              <button type="submit" class="btn btn-secondary btn-sm btn-lg py-3 btn-block" id="confirm-purchase" onclick="window.location='./thankyou.php'">Finalizar la compra</button>
            </div>
    </div>
    </div>   
    </div>
    </div>
      
<!-- -->
          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>
  </div>
  </body>
</html>
<!-- FOOTER --> 
<?php
include '../Libs/footer.php';
?>