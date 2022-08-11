<?php
session_start();

session_destroy();

header("location: ../../pagina_principal/index.php");

exit();


?>