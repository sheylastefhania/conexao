<?
/* 
PODE APAGAR

não se pode usar header (redirecionamento) em página onde se tenha caneçalho HTML ou qualquer escrita html (echo), pois ele nao aceita duas escritas html na mesma página. Isso serve para a página que chamou esta pagina

Inicia a sessão*/
session_start();  
	
//agora verifico se ele possui permissão para acessar a página
if (!isset($_SESSION[validacao])) // verifica se váriavel de sessão não existe (nao ta logado)
	{
	//  se nao : redireciona para pagina de login
	
	header ("Location: login.php");
	}
?>
