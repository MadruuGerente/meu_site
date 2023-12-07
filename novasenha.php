<?php
include('conexao.php');

if(!isset($_SESSION)){
    session_start();
    $login = $_SESSION['login'];
    echo $login;
    if(isset($_POST['nova_senha']) || isset($_POST['confirmar'])){
        if(strlen($_POST['nova_senha']) == 0 ){
            echo " digite sua nova senha";
        }elseif( strlen($_POST['confirmar']) == 0){
            echo "digite o outro campo ";

        }elseif($_POST['nova_senha'] == $_POST['confirmar']){
            // limpa os campos que ja foram usadas pára deixar o site mais seguro
            $nova_senha = $mysqli->real_escape_string($_POST['nova_senha']);
            
            $sql_code = "UPDATE cadastro SET senha = '$nova_senha' WHERE login_cadastro = $login";
            $sql_query = $mysqli->query($sql_code) or die("falha na execução SQL: ". $mysqli->error);
            // retorna a quantidade de linhas 
            if($sql_query){
                echo ' foi negao';
            }
        }else{
            echo 'digite a mesma senha';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOVA SENHA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class = "principal">
    <div class = "box">
        <fieldset classs = "fild">
            <h2 class = "title"><legend> Nova senha </legend></h2>
            <form method="POST" autocomplete="off">
            <div>
                <label class = "label_input" for="nova_senha">Login:</label><br>
                <input class = "input" type="text" id="nova_senha" name="nova_senha"  placeholder="Nova senha "><br>
            </div>
            <div>
                <label class = "label_input" for="confirmar">Senha:</label><br>
                <input class = "input" type="password" id="confirmar" name="confirmar" placeholder="Confirmar ">
            </div>

            <input class = "button"type="submit" value="Recuperar">
        </fieldset>
    </div>
      
   
</body>
</html>