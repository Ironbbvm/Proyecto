<?php
include ("../conexion.php");


if(isset($_POST['nombre'])){
    $DNI = $_POST['dni'];           //Cambie de dni a usuario
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $campos = array();

    if($nombre==""){
        array_push($campos, "el nombre esta vacio");
    }
    if($password=="" || strlen($password)<6){
        array_push($campos, "la contraseña debe tener mar de 6 caracteres");
    }
    if($correo=="" || strpos($correo, "@")===false){
        array_push($campos, "Ingresa un correo electronico valido");
  
    }
    if(count($campos)>0){
        echo "<div class='error'>";
        for($i=0; $i< count($campos); $i++){
            echo "<li>".$campos[$i]."</li></div>";
        }
    }
    else{
        $cargar = "INSERT INTO `personas`(`nom_apell`, `DNI`, `fecha_nac`, `domicilio`, `id_tipo_sangre`, `id_tipo_persona`, `id_sexo`) VALUES ('$nombre','$DNI', NULL , NULL, NULL, '3',NULL)";
        $resultadocargar = mysqli_query($conex,$cargar);


       $sql = "SELECT id_persona FROM personas WHERE DNI='$DNI'" ;
       $resultados = $conex->query($sql);
       
       if($resultados->num_rows > 0){
            while($row = $resultados->fetch_assoc()){
                $IDP = $row['id_persona'];
                $crear = "INSERT INTO `usuarios`(`correo`, `password`, `id_persona`) VALUES ('$correo', '$password','$IDP')";
                $resultadocrear = mysqli_query($conex,$crear);
            }
            header("location: ../../Formulario_logeo/index.html");

       }


        

    }
    echo"</div>";
    

}


?>