<?php

    include("../../php/conexao/connection.php");

    if (!isset($_SESSION)) session_start();

    if($_SESSION['UsuarioNome'] == null){
    /* Manda a pessoa de volta caso não esteja logada*/

        header("Location: ../index.html");
        exit();
    }

    include("../../php/conexao/connection.php");

        $escola = $_SESSION['UsuarioNome'];
        $segmento = 4; //mudar segmento

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
    <!--CSS-->
    <link rel="stylesheet" href="../../css/background.css" />

    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

</head>
<body id="bg-eja">
<div class="main">
        <div>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
                <div class="container">
                  <a class="navbar-brand" href="../menu.html">Produtividade</a>
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
                        <a class="nav-link" href="../anos_finais.php">Anos Finais</a> <!--disabled-->
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="../ensino_medio.php">Ensino Médio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" href="../eja.php">EJA</a>
                      </li>
                    </ul>
                    <div class="text-end">
                      <a class="btn btn-danger" href="../ensino_medio.php" role="button">Voltar</a>
                    </div>
                  </div>
                </div>
              </nav>
        </div> <!--header-->
    <div class="container d-flex flex-column bg-light bg-opacity-75 p-4 mt-3">
        <h1 class="mt-2">Adicione as Infomações da Turma</h1>
        <?php echo "<h3>Escola: {$_SESSION['UsuarioNome']} </h3>"  ; ?> <!--return(validate());-->
    <form action="php/inserir-3-4.php" method="post" name="formulario" onsubmit = "return(validate());" class="row g-3 mt-3">
        <div class="col-sm-3 col-flex">
        <label class="form-label" for="autoSizingInput">Turma</label>
        <select class="form-select" name="id" id="autoSizingSelect">
            <option selected>* Escolha a Turma</option>
            <!--CICLO 3-->
            <option value="EJA 301">EJA 301</option>
            <option value="EJA 302">EJA 302</option>
            <option value="EJA 303">EJA 303</option>
            <option value="EJA 304">EJA 304</option>
            <option value="EJA 305">EJA 305</option>
            <!--CICLO 4-->
            <option value="EJA 401">EJA 401</option>
            <option value="EJA 402">EJA 402</option>
            <option value="EJA 403">EJA 403</option>
            <option value="EJA 404">EJA 404</option>
            <option value="EJA 405">EJA 405</option>
            </select>
        </div>
        <div class="col-sm-3">
        <label class="form-label" for="autoSizingInput">Ano</label>
        <select class="form-select" name="ano" id="autoSizingSelect">
            <option selected>* Escolha o Ciclo</option>
            <option value="3o c">3º Ciclo</option>
            <option value="4o c">4º Ciclo</option>
            </select>
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matriculados</label>
            <input type="number" name="mat" class="form-control" id="autoSizingInput" placeholder="* Matriculados">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Avaliados por Relatório (Educação Especial)</label>
            <input type="number" class="form-control" name="av_relatorio" id="autoSizingInput" placeholder="* Nº de Avaliados por Relatório">
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="autoSizingInput">Avaliados por Nota</label>
            <input type="number" class="form-control" name="av_notas" id="autoSizingInput" placeholder="* Nº de Avaliados por Nota">
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="autoSizingInput">Total de Alunos com Nota Azul em TODAS as Disciplinas</label>
            <input type="number" class="form-control" name="azul_todas" id="autoSizingInput" placeholder="* Nº de Alunos">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matrícula do Professor de Português</label>
            <input type="number" class="form-control" name="professor_pt" id="autoSizingInput" placeholder="Matrícula (APENAS NÚMEROS)">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Alunos com Nota Azul em Português</label>
            <input type="number" class="form-control" name="azul_pt" placeholder="* Nº total de alunos" id="autoSizingInput" >
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matrícula do Professor de Matemática</label>
            <input type="number" class="form-control" name="professor_mat" id="autoSizingInput" placeholder="Matrícula (APENAS NÚMEROS)">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Alunos Nota Azul em Matemática</label>
            <input type="number" class="form-control" name="azul_mat" placeholder="* Nº total de alunos" id="autoSizingInput" >
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matrícula do Professor de Ciências</label>
            <input type="number" class="form-control" name="professor_cien" id="autoSizingInput" placeholder="Matrícula (APENAS NÚMEROS)">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Alunos com Nota Azul em Ciências</label>
            <input type="number" class="form-control" name="azul_cien" placeholder="* Nº total de alunos" id="autoSizingInput" >
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matrícula do Professor de Geografia</label>
            <input type="number" class="form-control" name="professor_geo" id="autoSizingInput" placeholder="Matrícula (APENAS NÚMEROS)">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Alunos com Nota Azul em Geografia</label>
            <input type="number" class="form-control" name="azul_geo" placeholder="* Nº total de alunos" id="autoSizingInput" >
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matrícula do Professor de História</label>
            <input type="number" class="form-control" name="professor_hist" id="autoSizingInput" placeholder="Matrícula (APENAS NÚMEROS)">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Alunos com Nota Azul em História</label>
            <input type="number" class="form-control" name="azul_hist" placeholder="* Nº total de alunos" id="autoSizingInput" >
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matrícula do Professor de Inglês</label>
            <input type="number" class="form-control" name="professor_ingles" id="autoSizingInput" placeholder="Matrícula (APENAS NÚMEROS)">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Alunos com Nota Azul em Inglês</label>
            <input type="number" class="form-control" name="azul_ingles" placeholder="Nº total de alunos" id="autoSizingInput" >
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matrícula do Professor de Arte</label>
            <input type="number" class="form-control" name="professor_arte" id="autoSizingInput" placeholder="Matrícula (APENAS NÚMEROS)">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Alunos com Nota Azul em Arte</label>
            <input type="number" class="form-control" name="azul_arte" placeholder="*Nº total de alunos" id="autoSizingInput" >
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matrícula do Professor de Educação Física</label>
            <input type="number" class="form-control" name="professor_ed_fis" id="autoSizingInput" placeholder="Matrícula (APENAS NÚMEROS)">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Alunos com Nota Azul em Educação Física</label>
            <input type="number" class="form-control" name="azul_ed_fis" placeholder="* Nº total de alunos" id="autoSizingInput" >
        </div>
        <p><strong>Campos com * são obrigatórios</strong></p>
        <p><strong>Não deixe os campos de quantidades em branco. Caso necessário preencha com 0 (zero).</strong></p>
        <div class="col-12">
            <button type ="submit" class="btn btn-success" name="inserir">Salvar</button>
            <a class="btn btn-danger" href="ciclos.html" role="button">Voltar</a>
        </div>
    </form>
    
    </div>

<script>

    function validate() {
      
        if( document.formulario.mat.value == "" ) {
         alert( "Adicione o número de alunos Matriculados!" );
         document.formulario.mat.focus();
         return false;
      }
      if( document.formulario.av_relatorio.value == "" ) {
         alert( "Campo obrigatório!" );
         document.formulario.av_relatorio.focus();
         return false;
      }
      if( document.formulario.av_notas.value == "" ) {
         alert( "Campo obrigatório!" );
         document.formulario.av_notas.focus();
         return false;
      }
      if( document.formulario.azul_todas.value == "" ) {
         alert( "Campo obrigatório!" );
         document.formulario.azul_todas.focus();
         return false;
      }
      if( document.formulario.azul_pt.value == "" ) {
         alert( "Campo obrigatório!" );
         document.formulario.azul_pt.focus();
         return false;
      }
      if( document.formulario.azul_mat.value == "" ) {
         alert( "Campo obrigatório!" );
         document.formulario.azul_mat.focus();
         return false;
      }
      if( document.formulario.cien.value == "" ) {
         alert( "Campo obrigatório!" );
         document.formulario.azul_cien.focus();
         return false;
      }
      if( document.formulario.azul_geo.value == "" ) {
         alert( "Campo obrigatório!" );
         document.formulario.azul_geo.focus();
         return false;
      }
      if( document.formulario.azul_hist.value == "" ) {
         alert( "Campo obrigatório!" );
         document.formulario.azul_hist.focus();
         return false;
      }
      if( document.formulario.azul_ed_fis.value == "" ) {
         alert( "Campo obrigatório!" );
         document.formulario.azul_ed_fis.focus();
         return false;
      }
      if( document.formulario.azul_arte.value == "" ) {
         alert( "Campo obrigatório!" );
         document.formulario.azul_arte.focus();
         return false;
      }
      if( document.formulario.azul_ingles.value == "" ) {
         alert( "Campo obrigatório!" );
         document.formulario.azul_ingles.focus();
         return false;
      }
      //alert("Turma Adicionada com Sucesso!");
      //window.open("add-turma.php");
      return (true);
    }

</script>
        
</body>
</html>