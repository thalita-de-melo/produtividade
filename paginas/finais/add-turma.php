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
                        <a class="nav-link active" href="../anos_iniciais.php">Anos Iniciais</a>
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
    <div class="container d-flex flex-column ">
        <h1 class="mt-2">Adicione as Infomações da Turma</h1>
        <?php echo "<h3>Escola: {$_SESSION['UsuarioNome']} </h3>"  ; ?> <!--return(validate());-->
    <form action="php/inserir.php" method="post" name="formulario" onsubmit = "return(validate());" class="row g-3 mt-3">
        <div class="col-sm-3 col-flex">
        <label class="form-label" for="autoSizingInput">Turma</label>
        <select class="form-select" name="id" id="autoSizingSelect">
            <option selected>* Escolha</option>
            <option value="EF 601">EF 601</option>
            <option value="EF 602">EF 602</option>
            <option value="EF 603">EF 603</option>
            <option value="EF 604">EF 604</option>
            <option value="EF 605">EF 605</option>
            <option value="EF 606">EF 606</option>
            <option value="EF 607">EF 607</option>
            <option value="EF 608">EF 608</option>
            <option value="EF 609">EF 609</option>
            <option value="EF 610">EF 610</option>
            <option value="EF 611">EF 611</option>
            <option value="EF 612">EF 612</option>
            <option value="EF 613">EF 613</option>
            <option value="EF 614">EF 614</option>
            <option value="EF 615">EF 615</option>
            <!-- 3º ano -->
            <option value="EF 701">EF 701</option>
            <option value="EF 702">EF 702</option>
            <option value="EF 703">EF 703</option>
            <option value="EF 704">EF 704</option>
            <option value="EF 705">EF 705</option>
            <option value="EF 706">EF 706</option>
            <option value="EF 707">EF 707</option>
            <option value="EF 708">EF 708</option>
            <option value="EF 709">EF 709</option>
            <option value="EF 710">EF 710</option>
            <option value="EF 711">EF 711</option>
            <option value="EF 712">EF 712</option>
            <option value="EF 713">EF 713</option>
            <option value="EF 714">EF 714</option>
            <option value="EF 715">EF 715</option>
            </select>
        </div>
        <div class="col-sm-3">
        <label class="form-label" for="autoSizingInput">Ano</label>
        <select class="form-select" name="ano" id="autoSizingSelect">
            <option selected>* Escolha</option>
            <option value="6o">6º Ano</option>
            <option value="7o">7º Ano</option>
            <option value="8o">8º Ano</option>
            <option value="9o">9º Ano</option>
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
            <input type="text" class="form-control" name="professor_pt" id="autoSizingInput" placeholder="Matrícula">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Alunos com Nota Azul em Português</label>
            <input type="number" class="form-control" name="azul_pt" placeholder="* Nº total de alunos" id="autoSizingInput" >
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matrícula do Professor de Matemática</label>
            <input type="text" class="form-control" name="professor_mat" id="autoSizingInput" placeholder="Matrícula">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Alunos Nota Azul em Matemática</label>
            <input type="number" class="form-control" name="azul_mat" placeholder="* Nº total de alunos" id="autoSizingInput" >
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matrícula do Professor de Ciências</label>
            <input type="text" class="form-control" name="professor_cien" id="autoSizingInput" placeholder="Matrícula">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Alunos com Nota Azul em Ciências</label>
            <input type="number" class="form-control" name="azul_cien" placeholder="* Nº total de alunos" id="autoSizingInput" >
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matrícula do Professor de Geografia</label>
            <input type="text" class="form-control" name="professor_geo" id="autoSizingInput" placeholder="Matrícula">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Alunos com Nota Azul em Geografia</label>
            <input type="number" class="form-control" name="azul_geo" placeholder="* Nº total de alunos" id="autoSizingInput" >
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matrícula do Professor de História</label>
            <input type="text" class="form-control" name="professor_hist" id="autoSizingInput" placeholder="Matrícula">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Alunos com Nota Azul em História</label>
            <input type="number" class="form-control" name="azul_hist" placeholder="* Nº total de alunos" id="autoSizingInput" >
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matrícula do Professor de Educação Física</label>
            <input type="text" class="form-control" name="professor_ed_fis" id="autoSizingInput" placeholder="Matrícula">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Alunos com Nota Azul em Educação Física</label>
            <input type="number" class="form-control" name="azul_ed_fis" placeholder="* Nº total de alunos" id="autoSizingInput" >
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matrícula do Professor de Arte</label>
            <input type="text" class="form-control" name="professor_arte" id="autoSizingInput" placeholder="Matrícula">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Alunos com Nota Azul em Arte</label>
            <input type="number" class="form-control" name="azul_arte" placeholder="* Nº total de alunos" id="autoSizingInput" >
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Matrícula do Professor de Inglês</label>
            <input type="text" class="form-control" name="professor_ingles" id="autoSizingInput" placeholder="Matrícula">
        </div>
        <div class="col-sm-3">
            <label class="form-label" for="autoSizingInput">Alunos com Nota Azul em Inglês</label>
            <input type="number" class="form-control" name="azul_ingles" placeholder="Nº total de alunos" id="autoSizingInput" >
        </div>
        <p><strong>Campos com * são obrigatórios</strong></p>
        <p><strong>Não deixe os campos de quantidades em branco. Caso necessário preencha com 0 (zero).</strong></p>
        <div class="col-12">
            <button type ="submit" class="btn btn-success" name="inserir">Salvar</button>
            <a class="btn btn-danger" href="../anos_finais.php" role="button">Voltar</a>
        </div>
    </form>
    
    </div>

<script>

    function validate() {
      
      if( document.formulario.mat.value == "" ) {
         alert( "Adicione o número de alunos Matriculados!" );
         document.formulario.mat.focus() ;
         return false;
      }
      alert("Turma Adicionada com Sucesso!");
      window.open("add-turma.php");
      //header("Location: add-turma.php");
      return (true);
    }

</script>
        
</body>
</html>