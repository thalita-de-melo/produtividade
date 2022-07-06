<?php 

if (!isset($_SESSION)) session_start();

          if($_SESSION['UsuarioNome'] == null){

            header("Location: ../../index.html");
            exit();
        }

include("../../../php/conexao/connection.php");


if(isset($_POST['apagar'])) {
    $escola = $_SESSION['UsuarioNome'];
    $id = $_SESSION['id'];

// Performing SQL query
$query = "delete from turmas_medio where id like '%$id%' AND escola like '%$escola%' ORDER BY id ASC"; 

$result = $conn->query($query);

//header("Location:../verturmas.php");
echo "<script>window.open('../verturmas.php', '_self');</script>"; //self para abrir na mesma aba sem pop up alert 
//echo "<script>window.close();</script>";

//header("Location: crud.php");

}




?>