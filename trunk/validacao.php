<?php
//MODULO PARA CERTIFICAR SE LOGIN E SENHA SAO VALIDOS

include "conecta.php";

$sql= "SELECT cod_usuario,cod_func,login,senha,email FROM usuario WHERE login = '$usuario'";

$resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a consulta dos seus dados, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte t�cnico. ");

$linha=mysql_fetch_array($resultado);
$achou=mysql_num_rows($resultado);


    $id=$linha["cod_usuario"];
	$nome=$linha["login"];
	$senhausu=$linha["senha"];
	 echo $modulo;
/*
if ($modulo == 'alterar'){
     header ("Location: verfuncoes.php");
	 }else{
	      header ("Location: alteradadosusu.php");

 }
 */
 $modulo="verfuncoes.php";


if(($achou < 1) and ($usuario <>'')){
		
		echo "<i>O login informado n�o foi encontrado. Por favor, informe o login novamente...</i><br>";
		
		
		echo "<a href=login.php>VOLTAR</a>";
	}
	
elseif(($achou > 0) and ($password<>$senhausu)){

 echo "<i>A senha informada n�o � v�lida. Por favor, informe a senha novamente...</i>";

}
elseif (($usuario=='') or ($password=='')){
echo"<i> H� campo n�o  preenchido.  Por favor, indique um valor.</i>";

}


	else { 
	
	
		$validacao ="1"; //usaremos essa vari�vel para verificar se ele est� logado (valor 1)
		//inicio uma Sessao
		session_start();
		//gravo as informa��es das vari�veis dentro das sess�es
		
		$_SESSION[usuario] = $nome;
		$_SESSION[codigo] = $id; // codigo do usuario
	//	$_SESSION[senha] = $senhausu;
		$_SESSION[validacao] = $validacao;
		
		// grava dados do acesso do usuario
				
		
		$ip=getenv("REMOTE_ADDR"); //pega  o ip para gravar na tabela acesso
        $hora=date("H:i:s");	   // hora no formato 00:00:00
		$datatual=date("Y-m-d");
        //grava na tabela acesso
		$sql="INSERT INTO acesso(usuario,data,ip,hora) VALUES ('$nome','$datatual','$ip','$hora')";
		$sql=mysql_query($sql) or die (mysql_error());


 	//Pronto agora redirecione o usu�rio para a p�gina  DESEJADA
	//header ("Location: '$modulo'");
	header ("Location: verfuncoes.php");
			
	} 
	
	
	
	
?>
