<?php
// Inicia sessões
session_start();

// Verifica se existe os dados da sessão de login
if(!isset($_SESSION["email"]) || !isset($_SESSION["nome"]))
{
    // Usuário não logado! Redireciona para a página de login
    echo"Usuário não logado. Você será redirecionado para login";
    header("Location: login.html");
    exit;
}
?>