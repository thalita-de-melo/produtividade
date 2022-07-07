<?php

          if (!isset($_SESSION)) session_start();

          if($_SESSION['UsuarioNome'] == null){
    /* Manda a pessoa de volta caso não esteja logada*/

            header("Location: ../index.html");
            exit();
        }

        include("../../php/conexao/connection.php");

        $escola = $_SESSION['UsuarioNome'];
        $segmento = 1; //mudar segmento

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
                  <a class="nav-link" href="../menu.html">Inicio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="../anos_iniciais.php">Anos Iniciais</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../anos_finais.php">Anos Finais</a> <!--disabled-->
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../medio.php">Ensino Médio</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../eja.php">EJA</a>
                </li>
              </ul>
              <div class="text-end">
                <a class="btn btn-danger" href="../menu.html" role="button">Voltar</a>
              </div>
            </div>
          </div>
        </nav>
    </div> <!--header-->
    <div class="container d-flex flex-column bg-light bg-opacity-75 p-4 mt-3">
        <h1 class="mt-2">Adicione as Infomações da Turma</h1>
        <?php echo "<h3>Escola: {$_SESSION['UsuarioNome']} </h3>"  ; ?> <!--return(validate());-->
    <form action="php/inserir.php" method="post" name="formulario" onsubmit = "return(validate());" class="row g-3 mt-3">
        <div class="col-sm-3 col-flex">
        <label class="form-label" for="autoSizingInput">Turma</label>
        <select class="form-select" name="id" id="autoSizingSelect">
            <option selected>* Escolha a Turma</option>
            <option value="EF 201">EF 201</option>
            <option value="EF 202">EF 202</option>
            <option value="EF 203">EF 203</option>
            <option value="EF 204">EF 204</option>
            <option value="EF 205">EF 205</option>
            <option value="EF 206">EF 206</option>
            <option value="EF 207">EF 207</option>
            <option value="EF 208">EF 208</option>
            <option value="EF 209">EF 209</option>
            <option value="EF 210">EF 210</option>
            <option value="EF 211">EF 211</option>
            <option value="EF 212">EF 212</option>
            <option value="EF 213">EF 213</option>
            <option value="EF 214">EF 214</option>
            <option value="EF 215">EF 215</option>
            <!-- 3º ano -->
            <option value="EF 301">EF 301</option>
            <option value="EF 302">EF 302</option>
            <option value="EF 303">EF 303</option>
            <option value="EF 304">EF 304</option>
            <option value="EF 305">EF 305</option>
            <option value="EF 306">EF 306</option>
            <option value="EF 307">EF 307</option>
            <option value="EF 308">EF 308</option>
            <option value="EF 309">EF 309</option>
            <option value="EF 310">EF 310</option>
            <option value="EF 311">EF 311</option>
            <option value="EF 312">EF 312</option>
            <option value="EF 313">EF 313</option>
            <option value="EF 314">EF 314</option>
            <option value="EF 315">EF 315</option>
            <!-- 4º ano -->
            <option value="EF 401">EF 401</option>
            <option value="EF 402">EF 402</option>
            <option value="EF 403">EF 403</option>
            <option value="EF 404">EF 404</option>
            <option value="EF 405">EF 405</option>
            <option value="EF 406">EF 406</option>
            <option value="EF 407">EF 407</option>
            <option value="EF 408">EF 408</option>
            <option value="EF 409">EF 409</option>
            <option value="EF 410">EF 410</option>
            <option value="EF 411">EF 411</option>
            <option value="EF 412">EF 412</option>
            <option value="EF 413">EF 413</option>
            <option value="EF 414">EF 414</option>
            <option value="EF 415">EF 415</option>
            <!-- 5º ano -->
            <option value="EF 501">EF 501</option>
            <option value="EF 502">EF 502</option>
            <option value="EF 503">EF 503</option>
            <option value="EF 504">EF 504</option>
            <option value="EF 505">EF 505</option>
            <option value="EF 506">EF 506</option>
            <option value="EF 507">EF 507</option>
            <option value="EF 508">EF 508</option>
            <option value="EF 509">EF 509</option>
            <option value="EF 510">EF 510</option>
            <option value="EF 511">EF 511</option>
            <option value="EF 512">EF 512</option>
            <option value="EF 513">EF 513</option>
            <option value="EF 514">EF 514</option>
            <option value="EF 515">EF 515</option>
            </select>
        </div>
        <div class="col-sm-3">
        <label class="form-label" for="autoSizingInput">*   Ano</label>
        <select class="form-select" name="ano" id="autoSizingSelect">
            <option selected>* Escolha o Ano</option>
            <option value="2o">2º Ano</option>
            <option value="3o">3º Ano</option>
            <option value="4o">4º Ano</option>
            <option value="5o">5º Ano</option>
            </select>
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matriculados</label>
            <input type="number" name="mat" class="form-control" id="autoSizingInput" placeholder="* Matriculados">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Avaliados por Relatório</label>
            <input type="number" class="form-control" name="av_relatorio" id="autoSizingInput" placeholder="* Nº de Avaliados por Relatório">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Avaliados por Nota</label>
            <input type="number" class="form-control" name="av_notas" id="autoSizingInput" placeholder="* Nº de Avaliados por Nota">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matrícula do Professor</label>
            <input type="text" class="form-control" name="professor" id="autoSizingInput" placeholder="* Matrícula">
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="autoSizingInput">Total de Alunos com Nota Azul em TODAS as Disciplinas</label>
            <input type="number" class="form-control" name="azul_todas" id="autoSizingInput" placeholder="* Nº de Alunos">
        </div>
        <div class="col-sm-4">
            <label class="form-label" for="autoSizingInput">Total de Alunos com Nota Azul em Português</label>
            <input type="number" class="form-control" name="azul_pt" placeholder="*" id="autoSizingInput" >
        </div>
        <div class="col-sm-4">
            <label class="form-label" for="autoSizingInput">Total de Alunos com Nota Azul em Matemática</label>
            <input type="number" class="form-control" name="azul_mat" placeholder="*" id="autoSizingInput" >
        </div>
        <div class="col-sm-4">
            <label class="form-label" for="autoSizingInput">Total de Alunos com Nota Azul em Ciências</label>
            <input type="number" class="form-control" name="azul_cien" placeholder="*" id="autoSizingInput" >
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="autoSizingInput">Total de Alunos com Nota Azul em Geografia</label>
            <input type="number" class="form-control" name="azul_geo" placeholder="*" id="autoSizingInput" >
        </div>
        <div class="col-sm-6">
            <label class="form-label" for="autoSizingInput">Total de Alunos com Nota Azul em História</label>
            <input type="number" class="form-control" name="azul_hist" placeholder="*" id="autoSizingInput" >
        </div>
        <p>Campos com * são obrigatórios</p>
        <div class="col-12">
            <button type ="submit" class="btn btn-success" name="inserir">Salvar</button>
            <a class="btn btn-danger" href="../anos_iniciais.php" role="button">Voltar</a>
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
      if( document.formulario.azul_cien.value == "" ) {
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
      //alert("Turma Adicionada com Sucesso!");
      //window.open("add-turma.php");
      return (true);
    }

</script>
        
</body>
</html>

