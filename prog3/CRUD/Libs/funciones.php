<?php

function preparar_query($conexion,$sql,$param,$types = "")
{
    $types = $types ?: str_repeat ("s", count($param));
    $cmd= $conexion->prepare($sql);
    if($param!=[]) $cmd->bind_param($types, ...$param);// parametros
    $cmd->execute();
    return $cmd;
}
function preparar_select($conexion,$sql,$param = [], $types = ""){
    return preparar_query($conexion,$sql,$param,$types)->get_result();
}

?>


