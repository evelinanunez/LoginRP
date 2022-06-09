<?php

$nombre= $_POST['nombre'];
function saludo($nombre= "Estimado/a"){
    return "<h2>Bienvenido/a!!  $nombre</h2>";
}

echo saludo($nombre);

$contrasena = $_POST['contrasena'];

echo "<h3>La contraseña ingresada es: $contrasena </h3>" ;

function validarContrasena($variable){
    $mensajes= "";
    if(isset($variable)){
        if(verificaMayuscula($variable)== true && verificaCaracteresNumericos($variable)== true  && verificaCaracteresEspeciales($variable)== true && validaCantidadCaracteres($variable)== true){
            $mensajes = "<p>La contraseña valida </p>";
        }else{
            $mensajes = "<p>No cumple con los parametros solicitados, por favor reingrese una nueva contraseña </p>";
        }
    }
    return $mensajes;
}

function validarContraseña2 ($variable) {
    $mensajes= "";
    if(isset($variable)){
        if(verificaCaracteresNumericos($variable)== false){
            $mensajes.= "<p>Debe contener como máximo 4 caracteres numéricos.</p>". "<br>";
        }
        if(verificaCaracteresEspeciales($variable)== false){
            $mensajes.= "<p>Debe contener uno de los siguientes caracteres: *, !, $, o #.</p>". "<br>";
        }
        if(verificaMinuscula($variable)== false){
            $mensajes.= "<p>Debe contener al menos una letra minuscula</p>". "<br>";
        }
        if(validaCantidadCaracteres($variable)== false){
            $mensajes.= "<p>Debe tener entre 8 y 11 caracteres</p>". "<br>";
        }
        if(verificaMayuscula($variable)== false){
            $mensajes.= "<p>Debe contener al menos una letra mayúscula</p>". "<br>";
        }
        if(verificaMayuscula($variable)== true && verificaCaracteresNumericos($variable)== true  && verificaCaracteresEspeciales($variable)== true && validaCantidadCaracteres($variable)== true){
            $mensajes= "<p>OK.</p>";
        }


    }
    return $mensajes;

}
echo validarContrasena($contrasena);
echo validarContraseña2($contrasena);

function validaCantidadCaracteres($variable){
    $resultado= false;
    if(isset($variable)){
        if(strlen($variable) >= 8 && strlen($variable) <= 11){
            $resultado= true;
        }else{
            $resultado=false;
        }

    }
    return $resultado;
}


function verificaMayuscula($variable){
    $resultado= false;
    if(isset($variable)){
        if(preg_match('/[A-Z]/',$variable) >= 1 ){
            $resultado = true;
        }
    }
    return $resultado;
}

function verificaMinuscula($variable){
    $resultado= false;
    if(isset($variable)){
        if((preg_match('/[a-z]/',$variable)>=1)){
            $resultado = true;
        }
    }
    return $resultado;
}


function contadorNumericos($variable){
    if (isset($variable)) {
        $array = str_split($variable);
        $arrayNumeros = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
        $contador = 0;
        for ($i = 0; $i< sizeof($array); $i++) {
            if (in_array($array[$i],$arrayNumeros)== true) {
                $contador++;
            }
        }

    }
    return $contador;

}
function verificaCaracteresNumericos($variable){
    $resultado= true;
    if(isset($variable)){
        if(contadorNumericos($variable)>4 OR contadorNumericos($variable)== 0 ){
            $resultado=false;
        }
    }
    return $resultado;
}


function verificaCaracteresEspeciales($variable){
    $resultado= false;
   /* caracteres especiales a verificar: ‘*’, ‘!’, ‘$’ o ‘#’*/
    if (isset($variable)) {
        $array = str_split($variable);
        $arrayNumeros = array("*","!","$","#");
        for ($i = 0; $i< sizeof($array); $i++) {
            if (in_array($array[$i],$arrayNumeros)== true) {
                $resultado =true;
            }
        }
    }
    return $resultado;

}





