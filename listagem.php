<?php

$nome=$_POST['nome'];
$idade=$_POST['idade'];
$peso=$_POST['peso'];
$altura=$_POST['altura'];
$email=$_POST['email'];
$senha=$_POST['senha'];

if($_POST){

$sql = ("INSERT INTO cadastro(nome, idade, peso, altura, email, senha)
VALUES ('$nome', '$idade', '$peso', '$altura', '$email', '$senha')");

$con=mysqli_connect("localhost","root") or die ("Configuração de Banco de dados errada!");
        
mysqli_select_db($con, "bde" ) or die ("Banco de dados inexistente!");

mysqli_query($con, $sql) or die ("<font style = Arial color= red><h1>houve um erro na gravação dos dados</h1></font>");
echo "<font style= Arial color=green><h1>Cadastro efetuado com sucesso!</h1><font>";
}