<html>
<head>
<link rel="stylesheet" type="text/css" href="css/sysco.css">
<title>Confirma&ccedil;&atilde;o</title>
</head>

<body>

<? 
$datatual=date("Y-m-d");

include "conecta.php"; 


if (empty($valor) or empty($categoria) or empty($beneficiado) or empty($descricao)) {  // verifica se os campos estao em branco
  echo "Ha campos nao preenchidos. Por favor, indique um valor. ! ";
}
else
{
  $sql="INSERT INTO movimentacao (valor, categoria, beneficiado, descricao, data_movimentacao, estado_operacao)
  VALUES ('$valor','$categoria','$beneficiado','$descricao', '$datatual', 'A')"; //Status A de Aguardando
  $sql=mysql_query($sql) or die ("Ocorreu uma falha durante o cadastro da movimentacao financeira, por favor, tente novamente. Caso o problema se repita, por favor, verifique os arquivos de log para rastrear a excecao.".mysql_error() );
  
 $selecao = mysql_query("SELECT * FROM movimentacao WHERE descricao = '$descricao'"); 

$row = mysql_fetch_array($selecao);



$cod_mov2 = $row["cod_movimentacao"];

 echo "Movimentacao cadastrada com sucesso!";
  
  echo "<a href='/sysco/Mov_upload_foto1.php?cod_movimentacao=$cod_mov2' target='_parent'><h1>Inserir Foto</h1></a></a>";

  
  
 
}
		
    echo "<form action='cadastraMovimentacao.php' method='post'>";
    
	echo "<input name='submit' type='submit' value='Retornar'/>"; // botao para retornar para pag. de cadastro
	
	echo "</form>";		

?>
</body>
</html>
