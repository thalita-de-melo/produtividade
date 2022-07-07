<?php

          if (!isset($_SESSION)) session_start();

          if($_SESSION['UsuarioNome'] == null){
    /* Manda a pessoa de volta caso não esteja logada*/

            header("Location: ../index.html");
            exit();
        }
        include("../../php/conexao/connection.php");

        $escola = $_SESSION['UsuarioNome'];
        $segmento = 2; //mudar segmento

        $query = "SELECT * FROM finalizado WHERE segmento like '$segmento' AND escola like '$escola';";
        
        $result = $conn->query($query);
        $linhas = mysqli_num_rows($result);

        if($linhas > 0){
          header("Location: ../menu.html");
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtividade</title>
    <link rel="icon" type="image/x-icon" href="../../images/01-SME.png" />
    <link rel="stylesheet" href="../../css/background.css" />

    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

</head>
<body id="bg-finais">
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
                        <a class="nav-link" href="../menu.html">Inicio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../anos_iniciais.php">Anos Iniciais</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="../anos_finais.php">Anos Finais</a> <!--disabled-->
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../ensino_medio.php">Ensino Médio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../eja.php">EJA</a>
                      </li>
                    </ul>
                    <div class="text-end">
                      <a class="btn btn-danger" href="../anos_finais.php" role="button">Voltar</a>
                    </div>
                  </div>
                </div>
              </nav>
        </div> <!--header-->

        <div class="container">
            <form action="php/crud.php" method="post" class="row g-3 mt-3" style="align-items: center;" >
                <div class="row-sm-6">
                    <label class="form-label " style="font-weight: bold; font-size: 24px;" for="autoSizingInput">Ano</label>
                    <select class="form-select" name="ano" id="autoSizingSelect">
                        <option selected value="">Todos os anos</option>
                        <option value="6o">6º Ano</option>
                        <option value="7o">7º Ano</option>
                        <option value="8o">8º Ano</option>
                        <option value="9o">9º Ano</option>
                        </select>
                </div>
                <div class="col-sm-6">
                    <input type ="submit" class="btn btn-primary" name="ler">
                    <a class="btn btn-danger mx-3" href="../anos_finais.php" role="button">Voltar</a>
                </div>
            </form>

            <div class="">
              
            </div>
        </div><!--container-->
        
    </div>
    
</body>
</html>