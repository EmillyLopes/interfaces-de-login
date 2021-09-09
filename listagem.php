<?php

$compromisso=$_POST['compromisso'];
$data=$_POST['data'];
$hora_inicio=$_POST['hora_inicio'];
$hora_termino=$_POST['hora_termino'];
$local=$_POST['local'];
$status=$_POST['status'];
$observacoes=$_POST['observacoes'];

if($_POST){

$sql = ("INSERT INTO agenda(compromisso, data, hora_inicio, hora_termino, local, status, observacoes)
VALUES ('$compromisso', '$data', '$hora_inicio', '$hora_termino', '$local', '$status', '$observacoes')");

$con=mysqli_connect("localhost","root") or die ("Configuração de Banco de dados errada!");

mysqli_select_db($con, "engeselt.dump" ) or die ("Banco de dados inexistente!");

mysqli_select_db($con, "engeselt.dump");


mysqli_query($con, $sql) or die ("<font style = Arial color= red><h1>houve um erro na gravação dos dados</h1></font>");
echo "<font style= Arial color=green><h1>Cadastro efetuado com sucesso!</h1><font>";
$resultado= mysqli_query($con, "SELECT * FROM agenda");


if ($linha = mysqli_fetch_array($resultado)){
    do{
        $compromisso =$linha["compromisso"];
        $data=$linha["data"];
        $hora_inicio=$linha["hora_inicio"];
        $hora_termino=$linha["hora_termino"];
        $local=$linha["local"];
        $status=$linha["status"];
        $observacoes=$linha["observacoes"];

        
        echo "<table border = '1' width=100%>";
        
        echo "<tr>";
        echo "<td align=20%><font color=red>Nome compromisso</font></td>";
        echo "<td align=20%><font color=red>Data</font></td>";
        echo "<td align=20%><font color=red>Hora início</font></td>";
        echo "<td align=20><font color=red>Hora Término</font></td>";
        echo "<td align=20><font color=red>Local</font></td>";
        echo "<td align=20><font color=red>Status</font></td>";
        echo "<td align=20><font color=red>Observações</font></td>";
        echo"</tr>";
        

        echo"<tr>";
        echo"<td align=20%>$compromisso</td>";
        echo"<td align=20%>$data</td>";
        echo"<td align=20%>$hora_inicio</td>";
        echo"<td align=20%>$hora_termino</td>";
        echo"<td align=20%>$local</td>";
        echo"<td align=20%>$status</td>";
        echo"<td align=20%>$observacoes</td></tr>";
        echo "<button id='edit'>Editar</button>";
   
    } while ($linha = mysqli_fetch_array($resultado));
} else {
    print "Nenhum dado foi encontrado";
}
}
?>