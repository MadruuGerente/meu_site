<?php 
include('conexao.php');
if(isset($_POST['nome']) && isset($_POST['login']) && isset($_POST['cpf']) && isset($_POST['senha'])){
    if(strlen($_POST['nome']) == 0 ){
        echo " digite seu nome";
    }elseif( strlen($_POST['login']) == 0){
        echo "digite seu login ";
    }elseif(strlen($_POST['cpf']) == 0){
        echo 'digite o seu cpf';
    }elseif(strlen($_POST['senha']) == 0){
        echo 'digite sua senha';
    }else{
        // limpa os campos que ja foram usadas pára deixar o site mais seguro
        $nome = $mysqli->real_escape_string($_POST['nome']);
        $login = $mysqli->real_escape_string($_POST['login']);
        $cpf = $mysqli->real_escape_string($_POST['cpf']);
        $senha = $mysqli->real_escape_string($_POST['senha']);  

        $sql_code = "INSERT INTO cadastro(login_cadastro, cpf, nome, senha) VALUES ('$login', '$cpf', '$nome', '$senha')";
        $sql_query = $mysqli->query($sql_code) or die("falha na execução SQL: ". $mysqli->error);

        if($sql_query){
            echo ' foi';
            $sql_code = "INSERT INTO login(cpf, login, senha) VALUES ('$cpf','$login', '$senha')";
            $sql_query = $mysqli->query($sql_code) or die("falha na execução SQL: ". $mysqli->error);
            header("Location: index.php");
        }else{
            echo ' n';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class = "principal">
    <div>
        <div class = "box">
            <fieldset class = "field">
                            <form method="POST" autocomplete="off">
            <h2 class = "title"> CADASTRE-SE </h2>

            <div>
                <label for="iNome">Nome:</label><br>
                <input type="text"  class ="input" id="inome" name="nome" placeholder="nome do usuario"><br>
            </div>
                
            <div>
                <label for="ilogin">Login:</label><br>
                <input type="text"  class ="input" id="ilogin" name="login"  placeholder="Login"><br>
            
            </div>

            <div>
                <label for="icpf">cpf:</label><br>
                <input type="text" class ="input" id="icpf" name="cpf"  placeholder="CPF"><br>
                                
            </div>
                <div>

                <label for="isenha">Senha:</label><br>
                <input type="text" class ="input" id="isenha" name="senha" placeholder="Senha"><br>
                
            </div>
            
                <label for="iconfirmarsenha">Confirmar senha:</label><br>
                <input type="text"  class ="input" id="iconfirmarsenha" name="confirmarsenha"  placeholder="Confirme a senha "><br>
            <div>
                <input type="submit" value="Cadastar">
            </div>
        </form>
            </fieldset>

        </div>
        
    </div>
    
        
</body>
</html>