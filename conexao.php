<?php
$hostname = "localhost";
$bd = "bd_usuario";
$user = "root";
$senha = "";

$mysqli = new mysqli($hostname, $user, $senha, $bd);
 
if( $mysqli->connect_errno){
    echo " falha ao conecatar:(". $mysli->connect_errno.")". $mysli->connect_errno;
}
?>