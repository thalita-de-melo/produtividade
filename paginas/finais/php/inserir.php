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
    $azul_todas = $_POST['azul_todas'];
    $professor_pt = $_POST['professor_pt'];
    $azul_pt = $_POST['azul_pt'];
    $professor_mat = $_POST['professor_mat'];
    $azul_mat = $_POST['azul_mat'];
    $professor_cien = $_POST['professor_cien'];
    $azul_cien = $_POST['azul_cien'];
    $professor_geo = $_POST['professor_geo'];
    $azul_geo = $_POST['azul_geo'];
    $professor_hist = $_POST['professor_hist'];
    $azul_hist = $_POST['azul_hist'];
    $professor_ed_fis = $_POST['professor_ed_fis'];
    $azul_ed_fis = $_POST['azul_ed_fis'];
    $professor_arte = $_POST['professor_arte'];
    $azul_arte = $_POST['azul_arte'];
    $professor_ingles = $_POST['professor_ingles'];
    $azul_ingles = $_POST['azul_ingles'];

// Performing SQL query
$query = "INSERT INTO turmas_finais VALUES (CURRENT_TIMESTAMP,'$escola','$id','$ano','$mat','$av_relatorio',
'$av_notas','$azul_todas','$professor_pt','$azul_pt', '$professor_mat','$azul_mat','$professor_cien','$azul_cien',
'$professor_geo','$azul_geo','$professor_hist','$azul_hist','$professor_ed_fis','$azul_ed_fis',
'$professor_arte','$azul_arte','$professor_ingles','$azul_ingles')"; 

$result = $conn->query($query);



}




?>