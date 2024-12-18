<?php

function dd($valor){
    echo "<pre>";
    var_dump($valor);
    echo "</pre>";
    exit;
}
function validarDatos1($datos)
{
    $errores1=[];
    $valorBien=intval($datos['valorBien']);
    if($valorBien===0){
        $errores1['valorBien']='campo vacio';   
    }else{

        if($_GET['flexRadioDefault']==='PEN')
        {
            if($valorBien<300000 ){
                $errores1['valorBien']='ingrese un monto valida';
            }
            if($valorBien>110000000 ){
                $errores1['valorBien']='ingrese un monto valida';
            }
        }
        if($_GET['flexRadioDefault']==='USD')
        {
            if($valorBien<90000 ){
                $errores1['valorBien']='ingrese un monto valida';
            }
            if($valorBien>900000){
                $errores1['valorBien']='ingrese un monto valida';
            }
        }
    }
         
    
    
    return $errores1;
}
function validarDatos2($datos)
{
    $errores2=[];
    $cuotaInicial=intval($datos['cuotaInicial']);
    if( $cuotaInicial===0 ){
        $errores2['cuotaInicial']='campo vacio';   
    }else{
        if($cuotaInicial<10 ){
            $errores2['cuotaInicial']='ingrese un % de cuota valida';
        }
        if($cuotaInicial>70 ){
            $errores2['cuotaInicial']='ingrese un % de cuota valida';
        }
    }
    
    
    return $errores2;
}
function validarDatos3($datos)
{
    $errores3=[];
    $plazoCredito=intval($datos['plazoCredito']);
    if( $plazoCredito===0 ){
        $errores3['plazoCredito']='campo vacio';
        
    }else{
        if($plazoCredito<=6 ){
            $errores3['plazoCredito']='ingrese un plazo valido';
        }
        if($plazoCredito>=48 ){
            $errores3['plazoCredito']='ingrese un plazo valido';
        }
    }
    return $errores3;
}
function validarDatos4($datos)
{
    $errores4=[];
    $interes=intval($datos['interes']);
    if($interes===0){
        $errores4['interes']='campo vacio';
        
    }else{
        if($interes<=4 ){
            $errores4['interes']='ingrese una tasa valida';
        }
        if($interes>=19 ){
            $errores4['interes']='ingrese una tasa valida';
        }
    }
    return $errores4;
}
function guardarMoneda()
{
    if($_POST){
        $moneda1=$_POST['flexRadioDefault'];
        //dd($moneda1);
        header('location:simulador.php');
        return $moneda1;
    }
    
}
function calcularCuota($montoPrestamo, $tasaInteresAnual, $plazoMeses) {
    $tasaInteresMensual = $tasaInteresAnual / 12 / 100;
    $numCuotas = $plazoMeses;
    $numerador = $montoPrestamo * $tasaInteresMensual * pow((1 +
    $tasaInteresMensual), $numCuotas);
    $denominador = pow((1 + $tasaInteresMensual), $numCuotas) - 1;
    $cuota = $numerador / $denominador;
    return $cuota;
}

    
?>