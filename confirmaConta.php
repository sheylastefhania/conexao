<html>
<head>
<link rel="stylesheet" type="text/css" href="css/sysco.css">
<title>Confirma&ccedil;&atilde;o</title>
</head>

<body>

<? 


include "conecta.php"; 


switch($opcao) {

//------------------------------------------------------
case '01': // CONFIRMA CONTA


if (empty($nome) or empty($saldo) or empty($depto)) {  // verifica se os campo nome,login e senha estao em branco

 	echo "Ha campos nao preenchidos. Por favor, indique um valor. ! ";
		
		} else { 
			
		$sql="INSERT INTO conta (nome, saldo, cod_depto) VALUES ('$nome','$saldo','$depto')";
		$sql=mysql_query($sql) or die ("Ocorreu uma falha durante o cadastro dos dados do novo administrador, por favor, tente novamente. Caso o problema se repita, por favor, verifique os arquivos de log para rastrear a excecao.".mysql_error() );
		echo "<h1> Registro gravado com sucesso !</h1>";
		
		}
		
    echo "<form action='cadastraconta.php' method='post'>";
    
	echo "<input name='submit' type='submit' value='Retornar'/>"; // botao para retornar para pag. de cadastro
	
	echo "</form>";		

	
	break;
//------------------------------------------------------
case '02': // Atualiza tabela usuarios
	
	$sql="UPDATE conta SET nome='$nome', saldo='$saldo', cod_depto='$depto' WHERE cod_conta='$cod_conta'";
	
	$sql=mysql_query($sql) or die (mysql_error());
	
	echo "<div align='center' class='copyright'>Registro Atualizado com Sucesso ! ! !</div>";
	
	break;
	
}// fim do swtich case

?>
</body>
</html>
