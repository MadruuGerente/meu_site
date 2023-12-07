<?php
include('conexao.php');
if(isset($_POST['login']) || isset($_POST['cpf'])){
    if(strlen($_POST['login']) == 0 ){
        echo " digite seu login!!";
    }elseif( strlen($_POST['cpf']) == 0){
        echo "digite seu cpf!!";
    }else{
         // limpa os campos que ja foram usadas pára deixar o site mais seguro
         $login = $mysqli->real_escape_string($_POST['login']);
         $cpf = $mysqli->real_escape_string($_POST['cpf']);
 
         $sql_code = "SELECT * FROM cadastro WHERE login_cadastro = '$login' AND cpf = '$cpf'";
         $sql_query = $mysqli->query($sql_code) or die("falha na execução SQL: ". $mysqli->error);
         // retorna a quantidade de linhas 
         $quantidade = $sql_query->num_rows;

        if ($quantidade == 1){

            $usuario = $sql_query->fetch_assoc();
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['login'] = $usuario['login_cadastro'];
            header("Location: novasenha.php");
        }else{
            echo "Falaha, algo esta errado ";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class = "principal">
    <div>
        <div class = "box">
            <fieldset class = "field">
                <h2 class = "title">  RECUPERAR SENHA </h2>
                <div>
                    <form method="POST" autocomplete="off">
                    <div>
                        <label for="ilogin" class = " label_input">Login:</label><br>
                        <input class = "input" type="text" id="ilogin" name="login"  placeholder="Login "><br>
                    </div>
                        
                    <div>
                        <label for="icpf" class = "label_input">Senha:</label><br>
                        <input class = "input"type="password" id="icpf" name="cpf" placeholder="CPF ">
                    </div>
                    <input class = "button" type="submit" value="Recuperar"> 
                    <input class = "button" type="submit" value="voltar">
                
                </div>

            </fieldset>
                    </div> 
    </div>
    
    
</body>
</html>


