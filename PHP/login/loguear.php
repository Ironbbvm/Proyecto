<?php
require '../conexion.php';
session_start();

$dni = $_POST['dni'];
$password = $_POST['password'];

$q = "SELECT * FROM personas where DNI='$dni'";
$consulta = mysqli_query($conex, $q);
$array = mysqli_fetch_array($consulta);

$nombre = $array['nom_apell'];
$tipo = $array['id_tipo_persona'];

if($array['DNI']==$dni){
    $identificador=$array['id_persona'];
    $contr = "SELECT * FROM usuarios where id_persona = '$identificador' ";
    $consultacont = mysqli_query($conex, $contr);
    $contra = mysqli_fetch_array($consultacont);
    if($contra['password']==$password && $array['DNI']==$dni && $array['id_tipo_persona'] == 3){
        echo "se encontro a la gente ";
        $_SESSION['usuario']=$array['nom_apell'];
        $_SESSION['tipo']=$array['id_tipo_persona'];;
        header("location: ../../pagina_principal/index.php");
    
    }else{
        echo "algo fallo";
    }

}else{
    echo"<script>alert('Tus datos son erroneos  ');window.location='salir.php'</script>";

}


?>