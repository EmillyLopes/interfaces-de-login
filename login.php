
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
 <script> 
  chrome.runtime.onMessage.addListener(function(message, sender, sendResponse){
    // ..code
    sendResponse({});
    return true;
	if(response == undefined || Object.keys(response).length == 0) return;

});
</script>

</head>

<?php
// Conexão com o banco de dados
$con=mysqli_connect("localhost","root") or die ("Configuração de Banco de dados errada!");
        
mysqli_select_db($con, "bde" ) or die ("Banco de dados inexistente!");

// Inicia sessões
session_start();

// Recupera o login
$email = isset($_POST["email"]) ? trim($_POST["email"]) : FALSE;

// Recupera a senha
$senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : FALSE;

// Usuário não forneceu a senha ou o login
if(!$email || !$senha){
	echo "Você deve digitar sua senha e login!";
	exit;
}
 
$SQL = ("SELECT email, senha FROM cadastro WHERE email = '$email'");
$result_id = mysqli_query($con,$SQL) or die("Erro no banco de dados!");
$total = mysqli_num_rows($result_id);

// Caso o usuário tenha digitado um login válido o número de linhas será 1..
if($total >0){
	// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão
	$query= sprintf("SELECT nome, idade, peso, altura  FROM cadastro");
	$dadoss = mysqli_fetch_array($result_id);
	
	//teste para ver se a senha tá igual
	var_dump($senha);
	echo"<br>";
	var_dump($dadoss["senha"]);

	// Agora verifica a senha
	if($senha == $dadoss["senha"]){
		// Passa os dados para a sessão e redireciona o usuário
		$_SESSION["nome"] = $dadoss["nome"];
		echo"voce sera redirecionado";
		header( "HTTP/1.1 301 Moved Permanently");
		header("Location:listagem_cadastros.php");
		exit;
	}
	
	// Senha inválida
	else{
	 	echo "Senha inválida!";
		exit;
	}
}
	// Login inválido
else{
	echo "O login fornecido por você é inexistente!";
	exit;
}

?>
