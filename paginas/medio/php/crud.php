<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtividade</title>

    <link rel="stylesheet" href="../../../css/background.css" />

    <style>
      th, td{
        font-size: .7em;
        vertical-align: middle;
      }
    </style>

<link rel="icon" type="image/x-icon" href="../../../images/01-SME.png" />

    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body id="bg-medio">

<div class="main">
    <div>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
          <div class="container">
            <a class="navbar-brand" href="../../menu.html">Produtividade</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
      
            <div class="collapse navbar-collapse" id="navbarsExample07">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="../../menu.html">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../anos_iniciais.php">Anos Iniciais</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../anos_finais.php">Anos Finais</a> <!--disabled-->
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="../../ensino_medio.php">Ensino Médio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../../eja.php">EJA</a>
                </li>
              </ul>
              <div class="text-end">
                <a class="btn btn-danger" href="../verturmas.php" role="button">Voltar</a>
              </div>
            </div>
          </div>
        </nav>
    </div> <!--header-->

  <div class="row-flex bg-light bg-opacity-100 p-1 m-3">
    <div class="col-12">
    <h1 class='text-center m-2 opacity-75 text-decoration-underline' style='color: #000000; font-weight:bold; '>Turmas</h1>

<?php       
    // Connecting, selecting database

          if (!isset($_SESSION)) session_start();

          if($_SESSION['UsuarioNome'] == null){

            header("Location: ../../index.html");
            exit();
        }


    include("../../../php/conexao/connection.php");

    $escola = $_SESSION['UsuarioNome'];
    
    //read
    if(isset($_POST['ler'])) {
        $searchq = $_POST['ano'];

    // Performing SQL query
    $query = "select * from turmas_medio where ano like '$searchq' AND escola like '$escola%' ORDER BY id ASC"; 

    $result = $conn->query($query);
    $linhas = mysqli_num_rows($result);

    //text-center align-self-center table-bordered

    if($linhas > 0){

      echo "<div class='table-responsive'>";
      echo "<table class='table table-striped text-center'>"; echo "
      <thead class='thead-light'> 
          <tr bgcolor='#5FAEC2'  style=''>
              <th>APAGAR</th>
              <th>ESCOLA</th> 
              <th>TURMA</th> 
              <th>ANO</th> 
              <th>MATRICULADOS</th>
              <th>AVALIADOS RELA.</th> 
              <th>AVALIADOS NOTA</th> 
              <th>AZUIS EM TODAS</th> 
              <th>PROF PT</th>
              <th>NOTA AZUL PT</th>
              <th>PROF LIT</th>
              <th>NOTA AZUL LIT</th>
              <th>PROFR MAT</th> 
              <th>NOTA AZUL MAT</th>
              <th>PROF BIO</th>
              <th>NOTA AZUL BIO</th>
              <th>PROF QUI</th>
              <th>NOTA AZUL QUI</th>
              <th>PROF FIS</th>
              <th>NOTA AZUL FIS</th>
              <th>PROF GEO</th> 
              <th>NOTA AZUL GEO</th>
              <th>PROF HIST</th>
              <th>NOTA AZUL HIST</th>
              <th>PROF SOC</th>
              <th>NOTA AZUL SOC</th>
              <th>PROF FIL</th>
              <th>NOTA AZUL FIL</th>
              <th>PROF ING</th>
              <th>NOTA AZUL ING</th>  
              <th>PROF ESP</th>
              <th>NOTA AZUL ESP</th> 
              <th>PROF ED FIS</th>
              <th>NOTA AZUL ED FIS</th>
          </tr> 
      </thead>";

          while ($row = $result->fetch_assoc()){
              echo "<form action='delete.php?id=".$row['id']."' onsubmit='return confirma()' method='post'>";
              //$id = $row["id"];
              //$_SESSION['id'] = $id;
              //<td><input type ='hidden' style='display: none;' name='id' value='".$row['id']."'></td>
              echo "<tr class='' style=''>  <td><button type ='submit' class='btn btn-danger mt-2' onClick='' name='apagar'><i class='bi bi-trash' syle='font-size: 20px;'></i></button></td> <td>".$row["escola"]." </td> <td>".$row["id"]." </td> <td>".$row["ano"]." </td> <td> ".$row["mat"]." </td> <td> ".$row["av_relatorio"]." </td> <td>".$row["av_notas"]." </td> <td>".$row["azul_todas"]."</td> <td> ".$row["professor_pt"]."</td>  <td>".$row["azul_pt"]."</td> <td> ".$row["professor_lit"]."</td>  <td>".$row["azul_lit"]."</td> 
              <td> ".$row["professor_mat"]."</td> <td>".$row["azul_mat"]."</td> <td> ".$row["professor_bio"]."</td> <td>".$row["azul_bio"]."</td> <td> ".$row["professor_qui"]."</td>  <td>".$row["azul_qui"]."</td> <td> ".$row["professor_fis"]."</td>  <td>".$row["azul_fis"]."</td> <td> ".$row["professor_geo"]."</td> <td>".$row["azul_geo"]."</td> <td> ".$row["professor_hist"]."</td> <td>".$row["azul_hist"]."</td> <td> ".$row["professor_soc"]."</td>  <td>".$row["azul_soc"]."</td> <td> ".$row["professor_fil"]."</td>  <td>".$row["azul_fil"]."</td> <td> ".$row["professor_ingles"]."</td> <td>".$row["azul_ingles"]."</td> <td> ".$row["professor_esp"]."</td> <td>".$row["azul_esp"]."</td>  <td> ".$row["professor_ed_fis"]."</td> <td>".$row["azul_ed_fis"]."</td>  </tr>";
              
            }
      }else{
          echo "<p>Resultado não encontrado</p>";
      }
          } else {
              
          }

    echo "</form>";
    echo "</table>";

    echo "<p style='text-align: center; font-weight: bold;'>Total de Turmas: $linhas </p>";

    


    function apagar($id){
        $query = "delete from turmas_medio where id like '%$id%' AND escola like '%$escola%' ORDER BY id ASC"; 
    }


?>

      </div><!--table-->
    </div>
  </div>

<div class="">
          <a class="btn btn-danger mx-3" href="../verturmas.php" role="button">Voltar</a>
        </div>
    </div>
</div>

<script>
  function confirma(){
    if(confirm("Tem certeza que deseja apagar essa turma?")){
      alert("Turma apagada")
      return true;
    }else{
      return false;
    }
  }
</script>

</body>
</html>