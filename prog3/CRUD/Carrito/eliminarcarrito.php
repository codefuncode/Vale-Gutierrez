<?php
    session_start();
    $arreglo = $_SESSION['carrito'];
    for($i=0;$i<count($arreglo);$i++){
    if($arreglo[$i]['iIdProductos'] != $_POST['id']){
        $arreglonuevo[]=array(
                'iIdProductos'=>$arreglo[$i]['iIdProductos'],
                'sNombre'=>$arreglo[$i]['sNombre'],
                'fPrecio'=>$arreglo[$i]['fPrecio'],
                'cantidad'=>$arreglo[$i]['cantidad'],
        );
    }
}
if(isset($arreglonuevo)){
    $_SESSION['carrito']=$arreglonuevo;
}else{
    //Quiere decir que el registro a eliminar es el único que habia
    unset($_SESSION['carrito']);
}
echo "listo";
?>