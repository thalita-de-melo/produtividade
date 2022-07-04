<?php

          if (!isset($_SESSION)) session_start();

          if($_SESSION['UsuarioNome'] == null){
    /* Manda a pessoa de volta caso não esteja logada*/

            header("Location: ../index.html");
            exit();
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anos Iniciais</title>

    
    <!--CSS-->
    <link rel="stylesheet" href="css/estilo.css"/>

    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

</head>
<body class="bg-success bg-opacity-10">

<script>
      function status(){
        let getStatus = confirm("Uma vez finalizado você não poderá editar os dados. \nVocê tem certeza que deseja finalizar esse módulo?");

        if(getStatus){
          //alert("oi");
          //finalizado();
          //show();
          return true;
        }else{
          //alert("tchau");
          return false;
        }
      }

      function show(){
        var element = document.getElementById('bloqueia');
        console.log(element);
        element.style.display = 'none';
      }
</script>
    

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
                        <a class="nav-link active" href="anos_iniciais.php">Anos Iniciais</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="anos_finais.php">Anos Finais</a> <!--disabled-->
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="medio.php">Ensino Médio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="eja.php">EJA</a>
                      </li>
                    </ul>
                    <div class="text-end">
                      <a class="btn btn-danger" href="menu.html" role="button">Voltar</a>
                    </div>
                  </div>
                </div>
              </nav>
        </div> <!--header-->
        <div class="container" id="principal">
        <h1 class='text-center mt-5 opacity-75 text-decoration-underline' style='color: #000000; font-weight:bold; '>Anos Iniciais</h1>
            <div class="row"> <!--anos iniciais e finais-->
                <div class="row mt-5" tabindex="-1" style="display=block" role="dialog" id="bloqueia">
                      <div class="col mt-3">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content rounded-4 shadow bg-light ">
                              <div class="modal-body p-4">
                                <h2 class="fw-bold mb-0">Adicionar Turma</h2>
                    
                                <a class="btn btn-lg btn-primary mt-5 w-100" href="iniciais/add-turma.php" role="button">Clique Aqui</a>
                              </div>
                            </div>
                          </div>  
                        </div>
                      <div class="col mt-3">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content rounded-4 shadow bg-light">
                              <div class="modal-body p-4">
                                <h2 class="fw-bold mb-0">Ver Turmas</h2>
                        
                                <a class="btn btn-lg btn-primary mt-5 w-100" href="iniciais/verturmas.php" role="button">Clique Aqui</a>
                              </div>
                            </div>
                          </div> 
                      </div> 
                </div>   
                <div class="row mt-5 text-center" tabindex="-1" role="dialog" id="modalTour">
                      <div class="col mt-3">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content rounded-4 shadow bg-light">
                              <div class="modal-body p-4">
                                <h2 class="fw-bold mb-0">Status</h2>

                                <form class="mt-3" action="iniciais/php/status.php" method="post" name="formulario" onsubmit = "return(status());">
                                  <span>
                                    <?php
                                    if (!isset($_SESSION)) session_start();

                                    if($_SESSION['UsuarioNome'] == null){
                              
                                        header("Location: ../../index.html");
                                        exit();
                                    }
                          
                                    include("../php/conexao/connection.php");

                                    $escola = $_SESSION['UsuarioNome'];
                                    $segmento = 1;

                                    $query = "SELECT * FROM finalizado WHERE segmento like '$segmento' AND escola like '$escola';";
                                    
                                    $result = $conn->query($query);
                                    $linhas = mysqli_num_rows($result);

                                    if($linhas > 0){
                                    while ($row = $result->fetch_assoc()){
                                      $status = $row["status"];
                                      echo '<p style="color:green; font-weight:bold; font-size:18px;">Finalizado</p>';
                                      echo '<script type="text/javascript">
                                      show();
                                      </script>';
                                      }
                                      }else{
                                        echo '<p style="color:red; font-weight:bold; font-size:18px;">Não finalizado</p>';
                                      }

                                      

                                    ?>
                                  </span>
                                  <button class="btn btn-warning text-white" onclick="" style="font-weight:bold;" type="submit" role="" id="flexSwitchCheckDefault" name="validaStatus" value="Finalizar">Finalizar</button>
                                </form>

                              </div>
                            </div>
                          </div>  
                        </div>
                </div>             
            </div> <!--STATUS-->
    </div>

    
</body>
</html>