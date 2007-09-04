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

 	echo "Todos os campos devem ser preenchidos ! ";
		
		} else { 
			
		$sql="INSERT INTO usuario (cod_func, email,login, senha) VALUES ('$tipo','$email','$login','$password')";
		$sql=mysql_query($sql) or die (mysql_error());
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
case '08': 
	
	break;
//------------------------------------------------------
case '09': 
	
	break;
//------------------------------------------------------
//------------------------------------------------------
case '10': 
	
	break;
//------------------------------------------------------
case '11': 
	
	break;
//------------------------------------------------------
case '12': 
	
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
