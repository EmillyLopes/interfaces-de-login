<?php

// Verificador de sessão
//require "verifica.php";

// Conexão com o banco de dados
require "conexao.php";

// Imprime mensagem de boas vindas

$con=mysqli_connect("localhost","root") or die ("Configuração de Banco de dados errada!");
        
mysqli_select_db($con, "bde" ) or die ("Banco de dados inexistente!");

session_start();

echo "<font face=\"Verdana\" size=2>Bem-Vindo " . $_SESSION["nome"] . "!<BR>\n";

$query= sprintf("SELECT nome, idade, peso, altura  FROM cadastro");

$dados= mysqli_query($con, $query) or die (mysqli_error());
$linha = mysqli_fetch_assoc($dados);
$total = mysqli_num_rows($dados);

?>

<html>
    <head>
	<link rel="stylesheet" type="text/css" href="layout.css" media="screen" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>Clientes cadastrados </title>
    </head>
<body>
    <?php
        if($total > 0) {
            do {
				$nome=$linha["nome"];
				$idade=$linha["idade"];
				$peso=$linha["peso"];
				$altura=$linha["altura"];
?>           
	<div class="tabela">
		<table class="table table-striped">
			<tr>
				<th scope="col"><font color=red>Nome </font></td>
				<th scope="col"><font color=red>Idade</font></td>
				<th scope="col"><font color=red>Peso</font></td>
				<th scope="col"><font color=red>Altura</font><td>                    
			</tr>
			<?php
				echo"<tr>";
				echo"<td >$nome</td>";
				echo"<td >$idade</td>";
				echo"<td >$peso</td>";
				echo"<td >$altura</td>";     	
				echo"</div>";
     
			?> 

	<?php
		//}while($linha = mysqli_fetch_assoc($dados));
		//}
	
            ?>
		<button class="btn btn-outline-dark"><a href="sair.php">Sair</a></button>
</body>
</html>
