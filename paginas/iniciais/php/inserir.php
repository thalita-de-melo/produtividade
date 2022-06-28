<?php 

if (!isset($_SESSION)) session_start();

          if($_SESSION['UsuarioNome'] == null){

            header("Location: ../../index.html");
            exit();
        }

include("../../../php/conexao/connection.php");


if(isset($_POST['inserir'])) {
    $escola = $_SESSION['UsuarioNome'];
    $id = $_POST['id'];
    $ano = $_POST['ano'];
    $professor = strtoupper($_POST['professor']);

// Performing SQL query
$query = "INSERT INTO turmas_iniciais VALUES ('$escola','$id')"; 

$result = $conn->query($query);



}




?>