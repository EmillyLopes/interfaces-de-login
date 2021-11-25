<?php

// Verificador de sessão
//require "verifica.php";

// Conexão com o banco de dados
require "conexao.php";

// Imprime mensagem de boas vindas

$con=mysqli_connect("localhost","root") or die ("Configuração de Banco de dados errada!");
        
mysqli_select_db($con, "bde" ) or die ("Banco de dados inexistente!");

session_start();

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <title>Clientes cadastrados </title>
    </head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-exclude" viewBox="0 0 16 16">
  <path d="M0 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h2a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-2H2a2 2 0 0 1-2-2V2zm12 2H5a1 1 0 0 0-1 1v7h7a1 1 0 0 0 1-1V4z"/>
</svg>
<h1 class="text-center">Listagem de cadastros</h1>
<div class="navegacao">
	<ul class="nav nav-tabs nav justify-content-end">
	<li class="nav-item">
		<a class="nav-link" href="cadastro.html">Cadastrar</a>
	</li>
	<li class="nav-item">
		<a class="nav-link active" aria-current="page" href="#">Listar</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="sair.php">Sair</a>
	</li>
	</ul>
</div>	
<div class="tabela">
		<table class="table table-striped">
			<tr>
				<th scope="col"><font color=red>Nome </font></td>
				<th scope="col"><font color=red>Idade</font></td>
				<th scope="col"><font color=red>Peso</font></td>
				<th scope="col"><font color=red>Altura</font><td>                    
			</tr>
    <?php
        if($total > 0) {
            do {
				$nome=$linha["nome"];
				$idade=$linha["idade"];
				$peso=$linha["peso"];
				$altura=$linha["altura"];

				echo"<tr>";
				echo"<td >$nome</td>";
				echo"<td >$idade</td>";
				echo"<td >$peso</td>";
				echo"<td >$altura</td>";     	
				echo"</div>";

		}while($linha = mysqli_fetch_assoc($dados));
		}
	
            ?>
</body>
</html>
