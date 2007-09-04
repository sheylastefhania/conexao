<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Editar Usuário</title>
</head>

<body>
<?
include "conecta.php";

echo($opcao);
switch($opcao) {

//------------------------------------------------------
case '1': // edição da pagina cadastrausuario.php
	
	$sql= "SELECT * FROM usuario WHERE (cod_usuario = $id)";
	
	$resultado=mysql_query($sql) or die ("Ocorreu uma falha durante o cadastro dos seus dados, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte técnico." );

	while ($linha=mysql_fetch_array($resultado)){
    	$codigo=$linha["cod_usuario"];
		
		$campo1=$linha["cod_func"];
		$campo2=$linha["login"];
		$campo3=$linha["senha"];
		$campo4=$linha["email"];
		
		
	}			
		echo "<form action='confirma.php' method='post'>";
		
		echo "Nome Funcionario:  <input name='nome'  type='text' value='$campo1'  size=30 ><br>";
    	echo "           Login:  <input name='login' value='$campo2'   type='text' size=30 ><br>";

	    echo "           Email:  <input name='email' value='$campo4' type='text' size=30 ><br>"; 
		
	    echo "<input type='hidden' name='id' value='$id' >";
		echo "<input type='hidden' name='opcao' value='2' >"; // VAI PASSAR OPÇÃO COM O VALOR 2 para confirma
		
		echo "<input name='submit' type='submit' value='Atualizar'/>";
		
		echo "</form>";
		
		
		echo "<form action='loginalterardados.php' method='post'>";
		echo "<input name='submit' type='submit' value='Cancelar'/>";
		
		echo "</form>";
		
		echo "<i> Os campos marcados com * são de preenchimento obrigatório. </i>";
		break;

//------------------------------------------------------

case '2': // edição da pagina CadastraPerfil.php
	
	$sql= "SELECT * FROM funcao WHERE (cod_funcao = $id)";
	
	$resultado=mysql_query($sql) or die (mysql_error());

	while ($linha=mysql_fetch_array($resultado)){
    	
		$codigo=$linha["cod_funcao"];
		
		$campo1=$linha["nome"];
		$campo2=$linha["cod_usuario"];
		$campo3=$linha["cod_dpto"];
		$campo4=$linha["perfil_usuario"];
		
		
	}			
		echo "<form action='confirma.php' method='post'>";
		
		echo " Função :  <input name='nome'  type='text' value='$campo1'  size=30 ><br>";
		
    	echo " Usuario:  <input name='cod_usuario' value='$campo2'   type='text' size=30 ><br>";

        echo " Departamento:  <input name='campo3' value='$campo3' type='text' size=30 disabled='disabled' >";	

	    echo "Modificar: <select name='departamento1'>"; // esse valor é o que será enviado para  confirma
		
		// Select do Departamento
		$sql="SELECT DISTINCT nome FROM Departamento";
		$sql=mysql_query($sql) or die (mysql_error());
		
		echo "<option value=''> -- SELECIONE -- </option>";
		
		   	while ($linha=mysql_fetch_array($sql)){
				$campo1novo=$linha["nome"];
				
				echo "<option value='$campo1novo' >$campo1novo</option>"; 
				}
		
		echo "</select><br>";
	    echo "<br>";
      
		//mostra Perfil
		
        echo " Perfil:  <input name='perfil_usuario' value='$campo4' type='text' size=30 disabled='disabled' >";
		
		//Select do Perfil
		
	    echo "Modificar: <select name='tipofuncao1'>"; // esse valor é o que será enviado para  confirma
	
		$sql="SELECT  DISTINCT desc_tipo FROM tipofuncao";
		
		$sql=mysql_query($sql) or die (mysql_error());
		
		echo "<option value=''> -- SELECIONE -- </option>";
		
		   	while ($linha=mysql_fetch_array($sql)){
				$campo2novo=$linha["desc_tipo"];
				
				echo "<option value='$campo2novo' >$campo2novo</option>"; 
				}
		
		echo "</select><br>";
	    echo "<br>";
		
	    echo "<input type='hidden' name='id' value='$id' >";
		echo "<input type='hidden' name='opcao' value='5' >"; // VAI PASSAR OPÇÃO COM O VALOR 5  para confirma.php
		echo "<input name='submit' type='submit' value='Alterar'/>";
		echo "</form>";
	
		break;
//------------------------------------------------------
case 05: // 
	
	$sql= "SELECT * FROM funcao WHERE (cod_funcao = $id)";
	
	$resultado=mysql_query($sql) or die (mysql_error());

	while ($linha=mysql_fetch_array($resultado)){
    	
		$codigo=$linha["cod_funcao"];
		
		$campo1=$linha["nome"];
		$campo2=$linha["cod_usuario"];
		$campo3=$linha["cod_dpto"];
		$campo4=$linha["perfil_usuario"];
		
		
	}			
		echo "<form action='confirma.php' method='post'>";
		
		echo " Função :  <input name='nome'  type='text' value='$campo1'  size=30 ><br>";
		
    	echo " Usuario:  <input name='cod_usuario' value='$campo2'   type='text' size=30 ><br>";

        echo " Departamento:  <input name='cod_dpto' value='$campo3' type='text' size=30 disabled='disabled' ><br>";	

		//mostra Perfil
		
        echo " Perfil:  <input name='perfil_usuario' value='$campo4' type='text' size=30 READONLY >";
		
		//Select do Perfil
		
	    echo "Modificar: <select name='tipofuncao1'>"; // esse valor é o que será enviado para  confirma
	
		$sql="SELECT  DISTINCT desc_tipo FROM tipofuncao";
		
		$sql=mysql_query($sql) or die (mysql_error());
		
		echo "<option value=''> -- SELECIONE -- </option>";
		
		   	while ($linha=mysql_fetch_array($sql)){
				$campo2novo=$linha["desc_tipo"];
				
				echo "<option value='$campo2novo' >$campo2novo</option>"; 
				}
		
			
		echo "</select><br>";
	    echo "<br>";
		
		
		
	    echo "<input type='hidden' name='id' value='$id' >";
		echo "<input type='hidden' name='opcao' value='7' >"; // VAI PASSAR OPÇÃO COM O VALOR 8  para confirma.php
		echo "<input type='hidden' name='dpto' value='$campo3' >";
		
		
		echo "<input name='submit' type='submit' value='Alterar'/>";
		echo "</form>";
	

		break;
//------------------------------------------------------
case 11: // 
	
		break;
//------------------------------------------------------


} // fim do switch
?>
</body>
</html>