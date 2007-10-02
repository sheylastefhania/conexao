<?php

//MODULO PARA CERTIFICAR SE LOGIN E SENHA SAO VALIDOS

include "conecta.php";

//------Testa de funcionario esta ativo-------------------------------

    $sqlativo="SELECT * FROM funcionario,usuario where usuario.cod_func=funcionario.nome having usuario.login='$usuario'";

    $result=mysql_query($sqlativo) or die ("Ocorreu uma falha durante a consulta do funcionario, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte tecnico. ".mysql_error());

    $linha=mysql_fetch_array($result);
	
    $id=$linha["cod_usuario"];
	$funcativo=$linha["ativo"];
	

switch($funcativo) { 

case 'SIM': 


	$sql= "SELECT cod_usuario,cod_func,login,senha,email FROM usuario WHERE login = '$usuario'";

	$resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a consulta dos dados, por favor, tente novamente. Caso     o problema se repita, entre em contato com o suporte tecnico. ");

    $linha=mysql_fetch_array($resultado);
    $achou=mysql_num_rows($resultado);


    $id=$linha["cod_usuario"];
	$nome=$linha["login"];
	$emailescolhido=$linha["email"];
//	$senhausu=$linha["senha"];
	
	
if(($achou < 1) and ($usuario <>'')){
		
		echo "<i>O login informado nao foi encontrado. Por favor, informe o login novamente...</i><br>";
		
		
		echo "<a href=login.php>VOLTAR</a>";
	}
	

elseif ($usuario=='') {
echo"<i>O login nao  foi preenchido. Por favor, indique um valor.</i>";

}else { 
	
	
		$validacao ="1"; //usaremos essa variavel para verificar se ele esta logado (valor 1)
		//inicio uma Sessao
		session_start();
		//gravo as informacoes das variaveis dentro das sessoes
		
		$_SESSION[usuario] = $nome;
		$_SESSION[codigo] = $id; // codigo do usuario
		$_SESSION[validacao] = $validacao;
		$_SESSION[email1]=$emailescolhido;
		
		// grava dados do acesso do usuario
				
	
	header ("Location: verusuario.php");
}
			
break;
//--------------------------------------------------------------------
case 'NAO':
    echo "<i>Nao e possivel realizar login: Funcionario Inativo...</i>";
 break;
//--------------------------------------------------------------------
case ' ':
    echo "<i>Acesso negado. Por favor, aguarde o recebimento da mensagem enviada para o seu e-mail, contendo um link de acesso ao nosso sistema. Ao clicar este link, voce devera confirmar seus dados e, após esta confirmacao, voce tera acesso ao nosso site. ..</i>";
 break;
}	
	
?>
