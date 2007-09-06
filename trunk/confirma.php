<title>Confirmação</title>
</head>

<body>

<? 


include "conecta.php"; 


switch($opcao) {

//------------------------------------------------------
case '01': // adicionar Usuarios na tabela Usuarios

$tipo=trim($tipo); // tira espaçoes em branco
$email=trim($email);
  

if (empty($tipo) or empty($login) or empty($password)) {  // verifica se os campo nome,login e senha estão em branco

 	echo "Há campos não preenchidos. Por favor, indique um valor. ! ";
		
		} else { 
			
		$sql="INSERT INTO usuario (cod_func, email,login, senha) VALUES ('$tipo','$email','$login','$password')";
		$sql=mysql_query($sql) or die ("Ocorreu uma falha durante o cadastro dos dados do novo administrador, por favor, tente novamente. Caso o problema se repita, por favor, verifique os arquivos de log para rastrear a exceção." );
		echo "<h1> Registro gravado com sucesso !</h1>";
		
		}
		
    echo "<form action='cadastrausuario.php' method='post'>";
    
	echo "<input name='submit' type='submit' value='Retornar'/>"; // botao para retornar para pag. de cadastro
	
	echo "</form>";		

	
	break;
//------------------------------------------------------
case '02': // Atualiza tabela usuarios
	
	$sql="UPDATE usuario SET cod_func='$nome', email='$email', login='$login' WHERE cod_usuario='$id'";
	
	$sql=mysql_query($sql) or die (mysql_error());
	
	echo "<h1> Registro Atualizado com Sucesso !</h1>";
	
	break;
//------------------------------------------------------
case '03': // apagar apenas um valor (tipoveiculo, marcaveiculo, modeloveiculo)

    $sql= "DELETE FROM usuario WHERE cod_usuario='$id'";
	$resultado=mysql_query($sql) or die (mysql_error());
	
	echo "<h1> O registro foi excluído com êxito !</h1>";
	
	
    echo "<form action='cadastrausuario.php' method='post'>";
    
	echo "<input name='submit' type='submit' value='Retornar'/>"; // botao para retorno
	
	echo "</form>";

	
	break;

//------------------------------------------------------
case '04': // Adicionar na tabela Funcao



if (empty($usuario) or empty($tpfuncao) or empty($depto)) {  // verifica se os campo nome,login e senha estão em branco

 	echo "Todos os campos devem ser preenchidos ! ";
		
		} else { 
			
			$sql="INSERT INTO FUNCAO (nome, cod_usuario, cod_dpto,perfil_usuario) VALUES ('$nome','$usuario','$depto','$tpfuncao')";
			$sql=mysql_query($sql) or die (mysql_error());
			echo "<h1> Função gravada com sucesso !</h1>";
		
		}
		
    echo "<form action='MenuAdm.php' method='post'>";
    
	echo "<input name='submit' type='submit' value='Retornar'/>"; // botao para retornar para pag. de cadastro
	
	echo "</form>";		

	break;
	
//------------------------------------------------------
case '05':// Atualiza tabela funcao


echo " <b> <i> Função      : </b> </i>  $nome   <br>";
echo " <b> <i> Usuário     : </b> </i>  $cod_usuario <br>";
echo " <b> <i> Departamento: </b> </i>  $departamento1<br>";
echo " <b> <i> Perfil      : </b> </i>  $tipofuncao1 <br>";

		 
    $sql="UPDATE funcao SET nome='$nome', cod_usuario='$cod_usuario', cod_dpto='$departamento1', perfil_usuario='$tipofuncao1' WHERE cod_funcao='$id'";
	
	$sql=mysql_query($sql) or die (mysql_error());	
	
	echo "<h1> Registro Atualizado com Sucesso !</h1>";

break;
//------------------------------------------------------
case '06': // Excluir na tabela Função
  
    $sql= "DELETE FROM funcao WHERE cod_funcao='$id'";
	
	$resultado=mysql_query($sql) or die (mysql_error());
	
	echo "<h1> Registro --Funcao--- foi excluído com êxito !</h1>";
	
	
    echo "<form action='MenuAdm.php' method='post'>";
    
	echo "<input name='submit' type='submit' value='Retornar'/>"; // botao para retorno
	
	echo "</form>";


	
	break;

//------------------------------------------------------
case '07': //alterar nivel de acesso do usuario
	


if  (($perfil_usuario<>$tipofuncao1) and ($tipofuncao1<>'')){


	echo " <b> <i> Usuário     : </b> </i>  $cod_usuario <br>";
	echo " <b> <i> Perfil      : </b> </i>  $tipofuncao1 <br>";

		 
    $sql="UPDATE funcao SET perfil_usuario='$tipofuncao1' WHERE cod_funcao='$id'";
	
	$sql=mysql_query($sql) or die ("Ocorreu uma falha durante a atualização do seu status, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte técnico");	
	
	echo "<h1> Status Atualizado com Sucesso !</h1>";
	
}else{

  echo "<i>O novo nível não foi indicado. Por favor, indique um valor para continuar a alteração. </i>";

  echo "<form action='MenuAdm.php' method='post'>";
    
  echo "<input name='submit' type='submit' value='Retornar'/>"; // botao para retornar para pag. de cadastro
	
  echo "</form>";		
}
 
break;
//------------------------------------------------------
case '08': //adciona funcionario


if (empty($adm))  {  // verifica se os campo nome,login e senha estão em branco

 	echo "O campo administrador não foi preenchido, indique um valor. ! ";
		
		} 
else
{ 

  $sql="INSERT INTO funcionario	(nome,cpf,tipo_logradouro,logradouro,numero,complemento,tipo_complemento,bairro,cidade,estado,cep,telefone,tipo_telefone,administrador,ativo) VALUES ('$nome','$cpf','$tipolog','$logradouro','$num','$complemento','$tipocomp','$bairro','$cidade','$estado','$cep','$fone','$tipofone','$adm','$ativo')";

	echo "<h1> Registro gravado com sucesso !</h1>";

	$sql=mysql_query($sql) or die ("Ocorreu uma falha durante o cadastro do funcionário, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte técnico.".mysql_error());


}
	
    echo "<form action='cadastrafuncionario.php' method='post'>";
    
	echo "<input name='submit' type='submit' value='Retornar'/>"; // botao para retornar para pag. de cadastro
	
	echo "</form>";		
	
		
	
	break;
//------------------------------------------------------
case '09': //editar funcionario


$sql="UPDATE funcionario SET nome='$nome',cpf='$cpf', tipo_logradouro='$tipolog', logradouro='$logradouro', numero='$num', complemento='$complemento', tipo_complemento='$tipocomp', bairro='$bairro', cidade='$cidade', estado='$estado', cep='$cep', telefone='$fone', tipo_telefone='$tipofone', administrador='$adm' WHERE cod_func='$id'";
	
$sql=mysql_query($sql) or die (mysql_error());	
	
echo "<h1> Registro Atualizado com Sucesso !</h1>";

break;
//------------------------------------------------------
//------------------------------------------------------
case '10': //inativar funcionario


$sql="UPDATE funcionario SET ativo='$ativo' WHERE cod_func='$id'";
	
$sql=mysql_query($sql) or die ("Ocorreu uma falha durante a inativação do funcionário, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte técnico. ".mysql_error());	
	
echo "<h1> Funcionario foi inativado com Sucesso !</h1>";

	
	break;
//------------------------------------------------------
case '11': //associar funcionario a departamento

	$sql="INSERT INTO FUNCDEPTO (funcionario, departamento) VALUES ('$funcionario','$depto')";
	$sql=mysql_query($sql) or die ("Ocorreu uma falha durante a associação do funcionário ao departamento, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte técnico. " );
	echo "<h1> Registro gravado com sucesso !</h1>";
		
	break;
//------------------------------------------------------
case '12': //atribuir status a funcionario
    
//	echo $depto;
	
	$sql="INSERT INTO funcao (cod_funcionario, perfil_usuario,cod_dpto) VALUES ('$nome','$atribuifuncao','$depto')";
    
	$sql=mysql_query($sql) or die ("Ocorreu uma falha durante a atribuição do funcionário ao perfil, por favor, tente novamente. Caso o problema se repita, entre em contato com o suporte técnico. ".mysql_error());
	

	echo "<h1> Registro gravado com sucesso !</h1>";
		

	break;
//------------------------------------------------------
//------------------------------------------------------
case '13': 
 

	break;
//------------------------------------------------------
case '14': 

	
	break;
//------------------------------------------------------
case '15': 
	
	break;
}

?>
</body>
</html>
