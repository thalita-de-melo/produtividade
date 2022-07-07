<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtividade</title>
</head>
<body>
    
</body>
</html>

<?php 

include("connection.php");
 

if(isset($_POST['email'])) {
	$email = trim(strtolower($_POST['email'])); //passar tudo para minusculo ou maisculo e remove espaço em branco antes ou depois
  	$senha = $_POST['senha'];

    $sql = "select * from escolas where email like '%$email%' AND senha like '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows != 1) {
    // output data of each row
        echo "<p>Login inválido!</p>";
            echo "<div class='container'>";
            echo "<button onclick=history.go(-1) class='center'>Voltar</button>";
            echo "</div>"; exit;
    } else {
      // Salva os dados encontados na variável $resultado
      $resultado = mysqli_fetch_assoc($result); 

      if (!isset($_SESSION)) session_start();

          // Salva os dados encontrados na sessão
          $_SESSION['UsuarioID'] = $resultado['id'];
          $_SESSION['UsuarioNome'] = $resultado['nome'];
          $_SESSION['UsuarioSenha'] = $resultado['senha'];
          $_SESSION['UsuarioEmail'] = $resultado['email'];
          $_SESSION['loggedin'] = true;

          // Redireciona o visitante
         header("Location: ../../paginas/menu.html"); exit;
         //echo "logado";

        }

  	}

class Login{
    //......
    public function iniciarSessao(){
        //só chama session_start se ainda não tiver sido chamada (uma vez)
        if(!(session_status() === PHP_SESSION_ACTIVE)){
            session_start();
        }
    }

    /*
      @return boolean
    */
    public function estaLogado(){
        //aqui não importa o nivel do usuario. O importante é saber se 
        // o usuário está autenticado
        if(isset($_SESSION['UsuarioEmail']) && isset($_SESSION['UsuarioSenha'])){
            return true;
        }
        return false;
    }


    /*
       Essa função chama todas as outras (fica mais facil de colocar 
       em varios arquivos). Então ela será chamada em todos os arquivos
    */
    public function autenticadoAutorizado($pagina){
        $this->iniciarSessao();

        //se não estiver logado encerra o script
        if(!$this->estaLogado()){
            echo 'Não autorizado';
            exit;
        }

        //se não entrar em nenhum dos ifs é por que o usuario está
        //autenticado e autorizado. Você pode futuramente usar 
        // ACL (lista de controle de acesso) que permite um controle
        //mais refinado
    }
}

  	

?>