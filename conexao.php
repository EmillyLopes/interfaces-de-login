<?
    $con=mysqli_connect("localhost","root") or die ("Configuração de Banco de dados errada!");
        
    mysqli_select_db($con, "bde" ) or die ("Banco de dados inexistente!");
?>