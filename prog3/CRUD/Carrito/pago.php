<?php
  session_start();
  if(isset($_SESSION['carrito'])){
    header("Location: ./carrito.php");
  }
  $arreglo = $_SESSION['carrito'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
  </head>
  <body>
  
  <div class="site-wrap">
    <?php include '..\Libs\header.php'; ?> 

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <div class="border p-4 rounded" role="alert">
              ¿Sos cliente? <a href="#">Haga click </a>para iniciar sesión
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">DETALLES DE FACTURACIÓN</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group">
                <label for="c_country" class="text-black">País<span class="text-danger">*</span></label>
                <select id="c_country" class="form-control">
                  <option value="1">Seleccione un país</option>    
                  <option value="2">Argentina</option>    
                  <option value="3">Asia</option>    
                  <option value="4">Europa</option>    
                  <option value="7">América del Norte</option>    
                  <option value="8">Oceania</option>       
                </select>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_fname" class="text-black">Nombre<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="c_fname">
                </div>
                <div class="col-md-6">
                  <label for="c_lname" class="text-black">Apellido<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_lname" name="c_lname">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Dirección<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Street address">
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="c_postal_zip" class="text-black">Código Postal<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip">
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="c_email_address" class="text-black">Correo Electrónico<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_email_address" name="c_email_address">
                </div>
                <div class="col-md-6">
                  <label for="c_phone" class="text-black">Teléfono<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number">
                </div>
              </div>

              <div class="form-group">
                <div class="collapse" id="create_an_account">
                  <div class="py-2">
                    <p class="mb-3">Cree una cuenta ingresando la información a continuación. Si es un cliente recurrente, inicie sesión en la parte superior de la página.</p>
                    <div class="form-group">
                      <label for="c_account_password" class="text-black">Contraseña de la cuenta</label>
                      <input type="email" class="form-control" id="c_account_password" name="c_account_password" placeholder="">
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>


          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">SU PEDIDO</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Productos</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                    <?php 
                      $total = 0;
                        for ($i=0;$i<count($arreglocarrito);$i++) {
                        $total = $total + ($arreglocarrito[ $i]['fPrecio'] * $arreglocarrito[ $i]['cantidad'] ); 
                    ?>  
                      <tr>
                        <td><?php echo $arreglocarrito[ $i] ['sNombre'];?></td>
                        <td>$<?php echo number_format($arreglocarrito[ $i]['fPrecio'] , 2, '.', '');?></td>
                      </tr>
                      <tr>
                        <td>Totales</td>
                        <td>$<?php number_format($total, 2, '.', '');?></td>
                      </tr>

                    <?php 
                     }
                    ?>
                    </tbody>
                  </table>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a lass="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Efectivo</a></h3>

                    <div class="collapse" id="collapsebank">
                      <div class="py-2">
                        <p class="mb-0">Realice su pago directamente en nuestra cuenta bancaria. Utilice su ID de pedido como referencia de pago. Su pedido no se enviará hasta que los fondos se hayan liquidado en nuestra cuenta.</p>
                      </div>
                    </div>
                  </div>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Tarjeta de crédito</a></h3>

                    <div class="collapse" id="collapsecheque">
                      <div class="py-2">
                        <p class="mb-0">Realice su pago directamente en nuestra cuenta bancaria. Utilice su ID de pedido como referencia de pago. Su pedido no se enviará hasta que los fondos se hayan liquidado en nuestra cuenta.</p>
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='....'">Realizar pedido</button>
                  </div>

                </div>
              </div>
            </div>

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