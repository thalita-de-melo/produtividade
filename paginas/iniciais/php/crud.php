<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>

    

    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body>

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
                  </div>
                </div>
              </nav>
        </div> <!--header-->

        <div class="">

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
    $query = "select * from turmas_iniciais where ano like '%$searchq%' AND escola like '%$escola%' ORDER BY id ASC"; 

    $result = $conn->query($query);
    $linhas = mysqli_num_rows($result);

    if($linhas > 0){
        echo "<p>Resultado da busca: $linhas Resultados</p>";

    echo "<table class='table table-striped text-center align-self-center'>"; echo "
    <thead class='thead-light'> 
        <tr bgcolor='#3973FA' style='font-weight:
    bold'>
            <th>Excluir</th>
            <th>ESCOLA</th> 
            <th>TURMA</th> 
            <th>ANO</th> 
            <th>MATRICULADOS</th>
            <th>AVALIADOS RELA.</th> 
            <th>AVALIADOS NOTA</th> 
            <th>PROFESSOR</th>
            <th>NOTAS AZUIS EM TODAS</th> 
            <th>NOTA AZUL PT</th> 
            <th>NOTA AZUL MAT</th>
            <th>NOTA AZUL CIEN</th> 
            <th>NOTA AZUL GEO</th>
            <th>NOTA AZUL HIST</th>  
        </tr> 
    </thead>";

        while ($row = $result->fetch_assoc()){
            echo "<form action='delete.php?id=".$row['id']."'  method='post'>";
            $id = $row["id"];
            $_SESSION['id'] = $id;
            //<td><input type ='hidden' style='display: none;' name='id' value='".$row['id']."'></td>
            echo "<tr>  <td><input type ='submit' class='btn btn-danger btn-sm mt-2' onClick='' name='apagar'></td> <td>".$row["escola"]." </td> <td>".$row["id"]." </td> <td>".$row["ano"]." </td> <td> ".$row["mat"]." </td> <td> ".$row["av_relatorio"]." </td> <td>".$row["av_notas"]." </td> <td> ".$row["professor"]."</td> <td>".$row["azul_todas"]."</td> <td>".$row["azul_pt"]."</td> <td>".$row["azul_mat"]."</td> <td>".$row["azul_cien"]."</td> <td>".$row["azul_geo"]."</td> <td>".$row["azul_hist"]."</td>  </tr>";
        }
    }else{
        echo "<p>Resultado não encontrado</p>";
    }
        } else {
            
        }

    echo "</form>";
    echo "</table>";


    function apagar($id){
        $query = "delete from turmas_iniciais where id like '%$id%' AND escola like '%$escola%' ORDER BY id ASC"; 
    }


?>
    </div>
</div>

</body>
</html>