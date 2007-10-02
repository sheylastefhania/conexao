<html>
<head>
<link rel="stylesheet" type="text/css" href="css/sysco.css">
<title>Confirma&ccedil;&atilde;o</title>
</head>

<body>

<? 


include "conecta.php"; 


if (empty($descricao) or empty($numero)) {  // verifica se os campo nome,login e senha estao em branco
  echo "Ha campos nao preenchidos. Por favor, indique um valor. ! ";
}
else
{
  $sql="INSERT INTO memorando (descricao, numero)
  VALUES ('$descricao','$numero')";
  $sql=mysql_query($sql) or die ("Ocorreu uma falha durante o cadastro do memorando, por favor, tente novamente. Caso o problema se repita, por favor, verifique os arquivos de log para rastrear a excecao." );
  
  
  $selecao = mysql_query("SELECT * FROM memorando WHERE descricao = '$descricao'"); 

  $row = mysql_fetch_array($selecao);

   echo "<h1> Memorando cadastrado com sucesso !</h1>";echo "<br>";


   $cod_memo2 = $row["cod_memo"];


  
  echo "<a href='/sysco/upload_foto1.php?cod_memo=$cod_memo2' target='_parent'><h1>Inserir Foto</h1></a></a>";

}

		
    echo "<form action='cadastraMemorando.php' method='post'>";
    
	echo "<input name='submit' type='submit' value='Retornar'/>"; // botao para retornar para pag. de cadastro
	
	echo "</form>";		

?>