<?php
 if(!isset($_SESSION)){
    session_start();
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Bem vindo ao painel,
     <?php echo $_SESSION['login']; 
     echo $_SESSION['senha'];
     ?>
</body>
</html>