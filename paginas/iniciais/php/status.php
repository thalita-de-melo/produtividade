<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtividade</title>
</head>
<body>
    

<?php

if (!isset($_SESSION)) session_start();

          if($_SESSION['UsuarioNome'] == null){

            header("Location: ../../index.html");
            exit();
        }

include("../../../php/conexao/connection.php");


if(isset($_POST['validaStatus'])) {
    $escola = $_SESSION['UsuarioNome'];
    $segmento = 1;
    $status = 1;

    $query = "INSERT INTO finalizado VALUES (CURRENT_TIMESTAMP,'$escola','$status','$segmento');";
    
    $check_query = "SELECT * FROM finalizado WHERE segmento like '$segmento' AND escola like '$escola';";
    $check = $conn->query($check_query);
    $check_rows = mysqli_num_rows($check);

    //echo $check_rows;

    if($check_rows > 0){
        header("Location: ../../menu.html");
    }else{
        $result = $conn->query($query);
        header("Location: ../../menu.html");

    }


    //header("Location: ../../menu.html");
}


?>


</body>
</html>