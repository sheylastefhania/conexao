<?
// MODULO PARA CONFIRMAÇÃO DE REGISTRO A SER EXCLUIDO

include "conecta.php";

switch($opcao) {

//------------------------------------------------------
case '1': // edição da pagina cadastrausuario.php
	


	
	$sql= "SELECT * FROM usuario WHERE (cod_usuario = $id)";
	
	$resultado=mysql_query($sql) or die (mysql_error());

	while ($linha=mysql_fetch_array($resultado)){
    	$codigo=$linha["cod_usuario"];
		$campo1=$linha["cod_func"];
		$campo2=$linha["login"];
		$campo3=$linha["senha"];
		$campo4=$linha["email"];
		
		
	}			
		echo "<form action='confirma.php' method='post'>";
		
		echo "Nome Funcionario: * <input name='nome'  type='text' value='$campo1'  size=30 READONLY ><br>";
    	echo "E-mail *  <input name='login' value='$campo2'   type='text' size=30 READONLY ><br>";
	    echo "Senha: * <input name='email' value='$campo4' type='text' size=30 READONLY><br>"; 
	
	    echo "<input type='hidden' name='id' value='$id' >";
		echo "<input type='hidden' name='opcao' value='03' >"; // VAI PASSAR OPÇÃO COM O VALOR 03(Apagar)
		
		echo "<input name='submit' type='submit' value='Confirmar Exclusão'/>";
		echo "</form>";
		
		

   
		
	// BOTAO para retornar ao cadastro de usuarios
	
    echo "<form action='cadastrausuario.php' method='post'>";
    
	echo "<input name='submit' type='submit' value='Retornar'/>";
	
	echo "</form>";
break;

case '02': 
	
	break;
//------------------------------------------------------
case '03': 
	
	break;



}	
?>