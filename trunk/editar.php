<?
include "conecta.php";


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
case '3': // editar funcionarios

$sql= "SELECT * FROM funcionario WHERE (cod_func = $id)";
	
	$resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a alteração do cadastro do funcionário, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte técnico.".mysql_error());

	while ($linha=mysql_fetch_array($resultado)){
    	
		$codigo=$linha["cod_func"];
		
		$campo1=$linha["nome"];
		$campo2=$linha["cpf"];
		$campo3=$linha["logradouro"];
		$campo4=$linha["tipolog"];
		$campo5=$linha["num"];
		$campo6=$linha["complemento"];
		$campo7=$linha["tipocomp"];
		$campo8=$linha["bairro"];
		$campo9=$linha["cidade"];
		$campo10=$linha["estado"];
		$campo11=$linha["cep"];
		$campo12=$linha["fone"];
		$campo13=$linha["tipo_fone"];
		$campo14=$linha["adm"];
		
		
	}			
		echo "<form action='confirma.php' method='post'>";
		
		
	echo "Nome          :  <input name='nome' type='text' value='$campo1'  size=30><br><br>";
	echo "CPF          :  <input name='cpf' type='text' value='$campo2' size=30><br><br>";
	echo "Logradouro   :  <input name='logradouro' type='text' value='$campo3' size=30>";	
	echo "Tipo Logradouro   :  <input name='tipolog' type='text' value='$campo4' size=30>";
	echo "Numero          :  <input name='num' type='text' value='$campo5' size=30><br><br>";
	echo "Complemento          :  <input name='complemento' type='text' value='$campo6' size=30>";
	echo " Tipo Complemento          :  <input name='tipocomp' type='text' value='$campo7'size=30><br>";
	echo "Bairro          :  <input name='bairro' type='text' value='$campo8' size=30><br><br>";
	echo "Cidade          :  <input name='cidade' type='text' value='$campo9' size=30><br><br>";
	echo "Estado          :  <input name='estado' type='text' value='$campo10' size=30>";
	echo "  CEP           : <input name='cep' type='text' value='$campo11' size=30><br><br>";
	echo "Telefone          :  <input name='fone' type='text' value='$campo12' size=30>";
	echo "Tipo Telefone          :  <input name='tipofone' type='text' value='$campo13' size=30><br>";
	echo "Administrador          :  <input name='adm' type='text' value='$campo14' size=30><br>";
	
	echo "<br>";
		
	echo "<input type='hidden' name='id' value='$id' >";
	echo "<input type='hidden' name='opcao' value='9' >"; // VAI PASSAR OPÇÃO COM O VALOR 9  para confirma.php
	echo "<input name='submit' type='submit' value='Alterar'/>";
	echo "</form>";
	
		break;

//-----------------------------------------------------
case '4'://inativar funcionario

$sql= "SELECT * FROM funcionario WHERE (cod_func = $id)";
	
	$resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a alteração do cadastro do funcionário, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte técnico.".mysql_error());

	while ($linha=mysql_fetch_array($resultado)){
    	
		$codigo=$linha["cod_func"];
		
		$campo1=$linha["nome"];
		$campo2=$linha["cpf"];
		$campo3=$linha["adm"];
		$campo4=$linha["ativo"];
	
		
	}			
	echo "<form action='confirma.php' method='post'>";
		
		
	echo "Nome          :  <input name='nome' type='text' value='$campo1'  READONLY size=30><br><br>";
	echo "CPF          :  <input name='cpf' type='text' value='$campo2' READONLY size=30><br><br>";

	echo "Administrador          :  <input name='adm' type='text' value='$campo3' READONLY size=30><br>";
	echo "Ativo         :  <input name='ativo' type='text' value='$campo4'  READONLY size=30><br>";

	echo "<br>";
	echo "<input type='hidden' name='ativo' value='NAO' >";	 // enviar valor para inativar o funcionario
	echo "<input type='hidden' name='id' value='$id' >";
	
	echo "<input type='hidden' name='opcao' value='10' >"; // VAI PASSAR OPÇÃO COM O VALOR 10  para confirma.php
	
	echo "<input name='submit' type='submit' value='CONFIRMAR'/>";
	echo "</form>";
	
	echo "<form action='cadastrafuncionario.php' method='post'>";

	echo "<input name='submit' type='submit' value='CANCELAR'/>";
	echo "</form>";
	
	
break;

//------------------------------------------------------

case 05: // alterar status do funcionario
	
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
case 06 :// atribuir status ao funcionario
 
echo $departamento;
 

$sql= "SELECT * FROM funcionario,funcdepto WHERE cod_func =$id having funcionario.nome=funcdepto.funcionario";

$resultado=mysql_query($sql) or die ("Ocorreu uma falha durante a atribuicao do status do funcionário, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte técnico.".mysql_error());

	while ($linha=mysql_fetch_array($resultado)){
    	
		$codigo=$linha["cod_func"];
		
		$campo1=$linha["nome"];
		$campo2=$linha["departamento"];		
	}	
	
			
	echo "<form action='confirma.php' method='post'>";
	
	echo "Nome          :  <input name='nome' type='text' value='$campo1' READONLY size=30><br>";
    echo "Departamento  :  <input name='depto' type='text' value='$campo2' READONLY size=30><br>";
 
	
			
// Select do Perfil

    echo "Selecione Tipo Perfil: ";
	echo "<select name='atribuifuncao' >"; // parametro a ser enviado para confirma
	
	$sql=mysql_query("SELECT * FROM TIPOFUNCAO where desc_tipo <> 'ADMINISTRADOR'") or die ("Houve erro na selecao da tabela");
	
	echo "<option value=''>-- SELECIONE FUNCAO --</option>";

	while ($linha=mysql_fetch_array($sql)) {
		
		$codigo=$linha['cod_tp_funcao'];
		$campotipo=$linha['desc_tipo'];
		
		echo "<option value='$campotipo'>$campotipo</option>"; // armazena o conteudo $campo selecionado em tipo de funcao
	}						   
    echo "</select>";
	echo "<br>";
	

	echo "<input type='hidden' name='id' value='$id' >";
	
	echo "<input type='hidden' name='opcao' value='12' >"; // VAI PASSAR OPÇÃO COM O VALOR 12  para confirma.php

	echo "<input name='submit' type='submit' value='CONFIRMAR'/>";
	echo "</form>";

// botao cancelar
	
	echo "<form action='menuadm.php' method='post'>";
	echo "<input name='submit' type='submit' value='CANCELAR'/>";
	echo "</form>";

break;

//------------------------------------------------------


/*




case 11: // 
	
	$sql= "SELECT * FROM funcao WHERE (cod_funcao = $id) ";
	
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
	
	
	
		break;*/
//------------------------------------------------------


} // fim do switch
?>
</body>
</html>