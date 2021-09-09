<?php


$con= mysqli_connect("localhost","root") or die ("Configuração de Banco de dados errada!");

mysqli_select_db($con, "engeselt.dump") or die ("Banco de dados inexistente!");

$query= sprintf("SELECT compromisso, data, hora_inicio, hora_termino, local, status, observacoes FROM agenda");

$dados= mysqli_query($con, $query) or die (mysqli_error());
$linha = mysqli_fetch_assoc($dados);
$total = mysqli_num_rows($dados);

?>

<html>
    <head>
        <link></link>
    <title>Minha agenda</title>
    </head>
    <body>
    <?php
        if($total > 0) {
            do {
    
        $compromisso =$linha["compromisso"];
        $data=$linha["data"];
        $hora_inicio=$linha["hora_inicio"];
        $hora_termino=$linha["hora_termino"];
        $local=$linha["local"];
        $status=$linha["status"];
        $observacoes=$linha["observacoes"];
 ?>           
            <button>Editar</button>
            <table border = '1' width=100%>
            <tr>
                <td align=20%><font color=red>Nome compromisso</font></td>
                <td align=20%><font color=red>Data</font></td>
                <td align=20%><font color=red>Hora início</font></td>
                <td align=20><font color=red>Hora Término</font></td>
                <td align=20><font color=red>Local</font></td>
                <td align=20><font color=red>Status</font></td>
                <td align=20><font color=red>Observações</font></td>
            </tr>
        
        <?php
        echo"<tr>";
        echo"<td align=20%>$compromisso</td>";
        echo"<td align=20%>$data</td>";
        echo"<td align=20%>$hora_inicio</td>";
        echo"<td align=20%>$hora_termino</td>";
        echo"<td align=20%>$local</td>";
        echo"<td align=20%>$status</td>";
        echo"<td align=20%>$observacoes</td></tr>";
        ?>
        </p>
<?php
	}while($linha = mysqli_fetch_assoc($dados));
	}
?>
    </body>
</html>