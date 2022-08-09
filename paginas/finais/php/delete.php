<?php 

if (!isset($_SESSION)) session_start();

          if($_SESSION['UsuarioNome'] == null){

            header("Location: ../../index.html");
            exit();
        }

include("../../../php/conexao/connection.php");


if(isset($_POST['apagar'])) {
    $escola = $_SESSION['UsuarioNome'];
    $id = $_GET['id'];

// Performing SQL query
$query = "delete from turmas_finais where id like '$id' AND escola like '$escola'"; 

$result = $conn->query($query);

echo "<script>window.open('../verturmas.php', '_self');</script>";
//echo "<script>window.close();</script>";

//header("Location: crud.php");

}




?>