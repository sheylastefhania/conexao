<?
/* 
PODE APAGAR

n�o se pode usar header (redirecionamento) em p�gina onde se tenha cane�alho HTML ou qualquer escrita html (echo), pois ele nao aceita duas escritas html na mesma p�gina. Isso serve para a p�gina que chamou esta pagina

Inicia a sess�o*/
session_start();  
	
//agora verifico se ele possui permiss�o para acessar a p�gina
if (!isset($_SESSION[validacao])) // verifica se v�riavel de sess�o n�o existe (nao ta logado)
	{
	//  se nao : redireciona para pagina de login
	
	header ("Location: login.php");
	}
?>
