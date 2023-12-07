<?php
include('conexao.php');
// verifica se existe uma variavel nome ou uma senha
if(isset($_POST['nome_login']) || isset($_POST['senha_login'])){
    if(strlen($_POST['nome_login']) == 0 ){
        echo " digite seu login";
    }elseif( strlen($_POST['senha_login']) == 0){
        echo "digite sua senha ";
    }else{
        // limpa os campos que ja foram usadas pára deixar o site mais seguro
        $nome_login = $mysqli->real_escape_string($_POST['nome_login']);
        $senha_login = $mysqli->real_escape_string($_POST['senha_login']);

        $sql_code = "SELECT * FROM login WHERE login = '$nome_login' AND senha = '$senha_login'";
        $sql_query = $mysqli->query($sql_code) or die("falha na execução SQL: ". $mysqli->error);
        // retorna a quantidade de linhas 

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1){

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['login'] = $usuario['login'];
            $_SESSION['senha'] = $usuario['senha'];

            header("Location: painel.php");
        }else{
            echo "LOGIN OU SENHA ESTÁ(ESTÃO) ERRADO(S)!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TELA INICIAL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class = "principal" >
    <div class = "box"> 
        <fieldset class = "field">
        
            <h2 class = "title"><b> <legend> Login</legend> </b></h2>
            <form method="POST" autocomplete="off">
                <div>

                    <label for="nome_login" class = "label_input">Login:</label><br>
                    <input type="text" class ="input" id="nome_login" name="nome_login"  placeholder="Login "><br><br>

                </div>
                <div>
                    <label for="senha_login"class = "label_input">Senha: </label><br>
                    <input type="password" class ="input"  id="senha_login" name="senha_login" placeholder="Senha ">
                </div>
                <p class="link">
                    Ainda não tem conta?
                    <a href="pegar.php">Cadastre-se</a>
                </p>

                <p class="link">
                    Esqueceu a senha?
                    <a href="recupera.php">Recuperar senha</a>
                </p>
                <input class = " button" type="submit" value="Enviar">
                <input class = "button " type="reset" value="Limpar">
            </form>
        </fieldset>
    </div>
  
</body>
</html>