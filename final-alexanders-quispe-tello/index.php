<?php
include_once('./controladores/funciones.php');
$errores1=[];
$errores2=[];
$errores3=[];
$errores4=[];

if($_GET){
if($_POST){
        
    $valorBien=$_POST['valorBien'];
    $plazoCredito=$_POST['plazoCredito'];
    if(isset($_POST['cuotaInicial'])){
        $cuotaInicial=$_POST['cuotaInicial'];
        $errores2=validarDatos2($_POST);
    }
    //
    $interes=$_POST['interes'];
    $errores1=validarDatos1($_POST);
    
    $errores3=validarDatos3($_POST);
    $errores4=validarDatos4($_POST);
  
    if(count($errores1)===0 && count($errores3)===0 && count($errores4)===0 ){
        $cuotas=calcularCuota(intval($valorBien),intval($interes),intval($plazoCredito));
        //dd($cuotas);
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<?php include_once('./partials/navBar.php') ?>

<section class="container  ">
    <p class="h1 text-info m-3 col-12">Simulador de Prestamo Hipotecario</p>
    <form method="get" class="mb-3" >
                <label for="">
                    Elige la Moneda:
                </label>
                <div class="form-check" >
                    <input class="form-check-input" value="PEN" type="radio" name="flexRadioDefault" id="flexRadioDefault1" 
                    <?php if(isset($_GET['flexRadioDefault'])){if($_GET['flexRadioDefault']==='PEN'){echo 'checked';}}?> >
                    <label class="form-check-label" for="flexRadioDefault1">
                        Soles
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="USD" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
                    <?php if(isset($_GET['flexRadioDefault'])){if($_GET['flexRadioDefault']==='USD'){echo 'checked';}}?> >   
                    <label class="form-check-label" for="flexRadioDefault2"  >
                        Dolares
                    </label>
                </div>
                <div class="row">
                    <div class="col col-3"><button type="sumbit" class="btn btn-info ">Seleccionar</button></div>
                </div>
            </form>
    <form action="" method="POST">
        <div class="row mb-4">
        
            <div class="col col-5 m-1">
                <input class="bg-light" name="valorBien" style="font-size :120%;width:80%;height:50px;margin:0px;" placeholder="¿Cual es el valor de su bien?" type="number" value="<?= isset($valorBien) ? $valorBien : '';?>">  
                <div class="container-fluid m-0">
                    <?php if(count($errores1) > 0) : ?>
                        <?php foreach ($errores1 as $key => $error) :?>
                            <p class="text-danger"><?= $error?></p>
                        <?php endforeach; ?>   
                    <?php endif;?> 
                </div>
                <div>
                    <?php
                    if(isset($_GET['flexRadioDefault'])){

                        if($_GET['flexRadioDefault'] === 'PEN'){
                            echo '<div style="display: flex;justify-content:space-between;width:80%;"> <p>Mínimo: S/.300.000 </p> <p> Máximo: S/.110.000.000</p></div>';
                            
                        }else{
                              echo '<div style="display: flex;justify-content:space-between;width:80%;"> <p>Mínimo: $90.000  </p> <p> Máximo: $900.000</p></div>';
                           
                        }
                    }
                    ?>
                </div>           
            </div>
            
            <div class="col col-5 m-1">
                <input class=" bg-light"  name="cuotaInicial"  style="font-size :120%;width:80%;height:50px;" placeholder="¿Cuanto es us cuota inicial?" type="number" value="<?= isset($cuotaInicial) ? $cuotaInicial : '';?>">
                <div class="container-fluid m-0">
                    <?php if(count($errores2) > 0) : ?>
                        <?php foreach ($errores2 as $key => $error) :?>
                            <p class="text-danger"><?= $error?></p>
                        <?php endforeach; ?>   
                    <?php endif;?> 
                </div>
                <div>
                    <?php
                    if(isset($_GET['flexRadioDefault'])){
                        echo '<div style="display: flex;justify-content:space-between;width:80%;"> <p>Mínimo: 10% </p> <p> Máximo: 70%</p></div>';
                    }
                    ?>
                </div>  
            </div>

            <div class="col col-5 m-1">
                <input class="bg-light"  name="plazoCredito"  style="font-size :120%;width:80%;height:50px;" placeholder="¿Por cuanto tiempo?(Meses)" type="number" value="<?= isset($plazoCredito) ? $plazoCredito : '';?>">
                <div class="container-fluid m-0">
                    <?php if(count($errores3) > 0) : ?>
                        <?php foreach ($errores3 as $key => $error) :?>
                            <p class="text-danger"><?= $error?></p>
                        <?php endforeach; ?>   
                    <?php endif;?> 
                </div>
                <div>
                    <?php
                    if(isset($_GET['flexRadioDefault'])){

                        echo '<div style="display: flex;justify-content:space-between;width:80%;"> <p>Mínimo: 6 </p> <p> Máximo: 48</p></div>';
                    }
                    ?>
                </div>  
            </div>
            <div class="col col-5 m-1">
                <input class="bg-light"  name="interes"  style="font-size :120%;width:80%;height:50px;" placeholder="¿A que tasa(%)?" type="number" value="<?= isset($interes) ? $interes : '';?>">
                <div class="container-fluid m-0">
                    <?php if(count($errores4) > 0) : ?>
                        <?php foreach ($errores4 as $key => $error) :?>
                            <p class="text-danger"><?= $error?></p>
                        <?php endforeach; ?>   
                    <?php endif;?> 
                </div>
                <div>
                    <?php
                    if(isset($_GET['flexRadioDefault'])){
                        echo '<div style="display: flex;justify-content:space-between;width:80%;"> <p>Mínimo: 4%</p> <p> Máximo: 19%</p></div>';
                    }
                    ?>
                </div>  
            </div>  
        </div>     
        <div syle="justify-content:center;">
        <button type="sumbit" class="btn btn-info ">Simular</button>
        <a href="index.php" class="btn btn-danger">Borrar</a>
        </div>
    </form>

</section>
<section class="container-fluid ">
    <table class="table table-sm border">
        
        <tbody>
        
        <?php ?>
      
     
            <?php 
            if($_POST && $_GET && isset($cuotas)){
                echo "<thead>
            <tr>
                <th>Número de cuota</th>
                <th>Monto de la cuota</th>
                <th>Saldo pendiente</th>
            </tr>
        </thead>";
                $numeroFormateado = number_format($cuotas, 2);
                $number=$cuotas*$plazoCredito;
                for($i=1;$i<=$plazoCredito;$i++)
                {
                $total=number_format($number -$cuotas*$i,2);
                    echo
                    "
                    <tbody>
                        <tr>
                            <td>
                                $i
                            </td>
                            <td>
                                $numeroFormateado
                            </td> 
                            <td>
                                $total
                            </td>   
                        </tr>
                    </tbody>";
                }}?>
              
        <?php?>
        
    </table>



</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>