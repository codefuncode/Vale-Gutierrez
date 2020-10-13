<?php
  session_start();
  include '..\Libs\header.php';
?>
<?php
  include '..\Libs\menuBuscar.php';
?>
<?php
///unset($_SESSION['carrito' ]);
 if(isset($_SESSION['carrito'])){ 
  //Si existe buscamos si ya estaba agregado ese producto
   if(isset($_GET['idproduct'])){ 
     $arreglo= $_SESSION['carrito']; 
     $encontro=false;
     $numero=0;
     for($i=0;$i<count($arreglo);$i++){ 
       if($arreglo[$i]['iIdProductos'] == $_GET['idproduct']){
         $encontro=true;
         $numero=$i;
       }
      }
      if($encontro == true){ 
        $arreglo[$numero]['cantidad']=$arreglo[$numero]['cantidad']+1;
        $_SESSION['carrito']=$arreglo;
        header("Location: ./carrito.php");
      }else{
      //No estaba el registro 
        $nombre="";
        $precio="";
        $sentencia=('SELECT * from Productos where iIdProductos='.$_GET['idproduct']);
       
        $sql=$conexion->query('SELECT * from Productos where iIdProductos='.$_GET['idproduct']) or die($conexion->error);
        $filas= mysqli_fetch_row($sql);
        $id=$filas[1];
    $nombre=$filas[2];
    $precio=$filas[6];
        $arreglonuevo=array(
                    'iIdProductos'=> $_GET['idproduct'],
                    'sNombre'=> $nombre,
                    'fPrecio'=> $precio,
                    'cantidad'=>1
        );
        array_push($arreglo,$arreglonuevo);
        $_SESSION['carrito']=$arreglo;
        header("Location: ./carrito.php");
      }
    }
  }else{
  //Creamos la variable de sesion
   if(isset($_GET['idproduct'])){
    $nombre="";
    $precio="";
    $iIdProductos = (isset($_GET["idproduct"])) ? intval($_GET["idproduct"]) : die("Error al recibir el id del producto");
    $sql=$conexion->query ("SELECT * from Productos where iIdProductos=$iIdProductos");
    $filas=mysqli_fetch_row($sql); 
    $id=$filas[1];
    $nombre=$filas[2];
    $precio=$filas[6];
    $arreglo[]=array(
                'iIdProductos'=> $_GET['idproduct'],
                'sNombre'=> $nombre,
                'fPrecio'=> $precio,
                'cantidad'=>1
    );   $_SESSION['carrito']=$arreglo;
    header("Location: ./carrito.php");
   }
  }
?>
<html>
<head> <title>Carrito de compras</title></head>
<body>
<h3>Lista del carrito</h3>
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div>
            <table class="table table-striped">
                <thead>
                  <tr >
                    <th class="product-id" style="color:#DC143C;border: 1px solid #eacbc">ID</th>
                    <th class="product-name" style="color:#DC143C;border: 1px solid #eacbc" >Productos</th>
                    <th class="product-price" style="color:#DC143C;border: 1px solid #eacbc" >Precio</th>
                    <th class="product-quantity" style="color:#DC143C;border: 1px solid #eacbc" >Cantidad</th>
                    <th class="product-total" style="color:#DC143C;border: 1px solid #eacbc" >Total</th>
                    <th class="product-remove" style="color:#DC143C;border: 1px solid #eacbc">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $total = 0;
                  if(isset($_SESSION['carrito'])){
                    $arreglocarrito= $_SESSION['carrito'];
                    ?>
                    
                    <?php
                    
                  for ($i=0;$i<count($arreglocarrito);$i++) {
                  $total = $total + ($arreglocarrito[ $i] ['fPrecio'] * $arreglocarrito[ $i] ['cantidad'] );
                ?>
                <tr>
                  <td class="product-id" >
                      <h2 class="h5"><?php echo $arreglocarrito[ $i] ['iIdProductos'];?></h2>
                    </td>
                    <td class="product-name">
                      <h2 class="h5"><?php echo $arreglocarrito[ $i] ['sNombre'];?></h2>
                    </td>
                    <td><?php echo $arreglocarrito[ $i] ['fPrecio'];?></td>
                    <td >
                      <div class="input-group mb-3" style="max-width: 120px;" >
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-light js-btn-minus btnDecrementar" 
                          style="border: 1px solid #eacbc8;color:#DC143C" type="button">&minus;</button>
                        </div>
                        <input type="text" style="color: black; border: 1px solid #eacbc8;background:transparent" class="form-control text-center txtCantidad" 
                        data-precio="<?php echo $arreglocarrito[ $i] ['fPrecio']; ?>"
                        data-id="<?php echo $arreglocarrito[ $i] ['iIdProductos']; ?>"
                        value="<?php echo $arreglocarrito[ $i] ['cantidad']; ?>" 
                        placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-light js-btn-plus btnIncrementar"  
                          style="border: 1px solid #eacbc8; color:#DC143C"type="button">&plus;</button>
                        </div>
                      </div>

                    </td>
                    <td class="cant<?php echo $arreglocarrito[ $i] ['iIdProductos'];?>">
                      $<?php echo $arreglocarrito[ $i] ['fPrecio']  *  $arreglocarrito[ $i] ['cantidad']; ?></td>
                    <td ><a href="#" class="btn btn-outline-danger btn-sm btnEliminar" data-id="<?php echo $arreglocarrito[ $i] ['iIdProductos'] ?>"><i class="far fa-trash-alt"></i>Eliminar</a></td>
                </tr>
                <?php  } } ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div>
                <a class="btn btn-secondary btn-sm" href="http://localhost/prog3/crud/carrito/carrito.php">Actualizar carrito</a>
                <a class="btn btn-secondary btn-sm" href="http://localhost/prog3/">Continuar comprando</a>
              </div>
            </div>
            
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class=" " style="color:#DC143C;">Totales</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="" style="color:#DC143C;">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="" style="color:#8B0000">$<?php echo $total; ?></strong>
                  </div>
                </div>
                <div class="row mb-5" >
                  <div class="col-md-6" >
                    <span class="" style="color:#DC143C">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="" style="color: #8B0000">$<?php echo $total; ?></strong>
                  </div>
                </div>
                <div  class="fila">
                  <div  class="col-md-12">
                    <button class="btn btn-secondary btn-lg py-3 btn-block" onclick="window.location='cobrar.php'">Pagar</button>
                  </div >
                </div >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
 

</body>
</html>
<!--Footer -->
<?php
include '../Libs/footer.php';

?>
 
 <script>
 
 $(document).ready(function(){
    $(".btnEliminar").click(function(event){
      event.preventDefault();
      var id = $(this).data('id');
      var boton = $(this);
      $.ajax({
        method:'POST',
        url:'./eliminarcarrito.php',
        data:{
          id:id
        }
      }).done(function(respuesta){
        location.href= "./carrito.php";
       boton.parent('td').parent('tr').remove();
      });
    });
    $(".txtCantidad").keyup(function(){
      var cantidad = $(this).val();
      var precio = $(this).data('precio');
      var id =  $(this).data('id');
      incrementar(cantidad,precio,id);
     
    });
    $(".btnIncrementar").click(function(){
      var precio = $(this).parent('div').parent('div').find('input').data('precio');
      var id = $(this).parent('div').parent('div').find('input').data('id');
  
      var cantidad = parseInt($(this).parent('div').parent('div').find('input').val());
      cantidad+=1;
      $(this).parent('div').parent('div').find('input').val(cantidad);
      incrementar(cantidad,precio,id);
    });
    $(".btnDecrementar").click(function(){
      var precio = $(this).parent('div').parent('div').find('input').data('precio');
      var id = $(this).parent('div').parent('div').find('input').data('id');
  
      var cantidad = parseInt($(this).parent('div').parent('div').find('input').val());
      if(cantidad > 1){
        cantidad-=1;
        $(this).parent('div').parent('div').find('input').val(cantidad);
        incrementar(cantidad,precio,id);
      }
     
    });
    function incrementar(cantidad, precio, id){
      var mult = parseFloat(cantidad)* parseFloat(precio);
      
      $(".cant"+id).text("$"+mult);
      $.ajax({
        method:'POST',
        url:'./actualizar.php',
        data:{
          id:id,
          cantidad:cantidad
        }
      }).done(function(respuesta){
        console.log(id, cantidad);
        //location.href= "./carrito.php";
      });
    }
  });
</script>