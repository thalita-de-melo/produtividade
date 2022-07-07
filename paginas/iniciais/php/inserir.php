<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtividade</title>

    <link rel="icon" type="image/x-icon" href="../../../images/01-SME.png" />
    <!--CSS-->
    <link rel="stylesheet" href="../../../css/background.css" />

    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    

</head>
<body id="bg-iniciais">
<div class="main">
        <div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
                <div class="container">
                  <a class="navbar-brand" href="menu.html">Produtividade</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
            
                  <div class="collapse navbar-collapse" id="navbarsExample07">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="menu.html">Inicio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="../anos_iniciais.php">Anos Iniciais</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="anos_finais.php">Anos Finais</a> <!--disabled-->
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="ensino_medio.php">Ensino Médio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="eja.php">EJA</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
    </div> <!--header-->
<div class="container mt-5">
        <div class="alert alert-success" id="sucesso" style="display: none;">Turma Adicionada</div>
        <div class="alert alert-danger" id="fail" style="display: none;">A turma que você está tentando adicionar já existe. Por favor verifique a numeração da turma e tente novamente.</div>
    
        <div class="col-12">
        <a class="btn btn-info text-white" href="../verturmas.php" role="button">Ver turmas</a>
            <a class="btn btn-danger" href="../add-turma.php" role="button">Voltar</a>
        </div>
    </form>
    
    </div>

</div>

<script>

</script>
        
</body>

<script>
    function sucesso(){
        document.getElementById("sucesso").style.display = "block";
    }

    function fail(){
        document.getElementById("fail").style.display = "block";
    }

</script>
</html>



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

 
// Performing SQL query  CURRENT_TIMESTAMP --> colocar isso
$query = "INSERT INTO turmas_iniciais VALUES (CURRENT_TIMESTAMP,'$escola','$id','$ano','$mat','$av_relatorio','$av_notas',
'$professor','$azul_todas','$azul_pt','$azul_mat','$azul_cien','$azul_geo','$azul_hist')"; 

$check_query = "SELECT * FROM turmas_iniciais WHERE id like '$id' AND escola like '$escola';";
$check = $conn->query($check_query);
$check_rows = mysqli_num_rows($check);

//echo $check_rows;

if($check_rows > 0){
    echo '<script>
            fail();
        </script>';
}else{
    $result = $conn->query($query);
    echo '<script>
        sucesso();
    </script>';

}



}  




?>