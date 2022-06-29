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
    $mat = $_POST['mat'];
    $av_relatorio = $_POST['av_relatorio'];
    $av_notas = $_POST['av_notas'];
    $professor = strtoupper($_POST['professor']);
    $azul_todas = $_POST['azul_todas'];
    $azul_pt = $_POST['azul_pt'];
    $azul_mat = $_POST['azul_mat'];
    $azul_cien = $_POST['azul_cien'];
    $azul_geo = $_POST['azul_geo'];
    $azul_hist = $_POST['azul_hist'];

// Performing SQL query
$query = "INSERT INTO turmas_iniciais VALUES (CURRENT_TIMESTAMP,'$escola','$id','$ano','$mat','$av_relatorio','$av_notas',
'$professor','$azul_todas','$azul_pt','$azul_mat','$azul_cien','$azul_geo','$azul_hist')"; 

$result = $conn->query($query);



}




?>