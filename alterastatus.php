
<?
 

include "conecta.php";


	$sql= "SELECT * FROM funcao";
	
	$resultado=mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados".mysql_error());
	
	echo "<br>";
    echo "<br>";
	
	
	echo "<table with=740 border=1 cellpading=1 cellspacing=1>";
	echo "<tr>";  // row --> linha
	

	echo "<th width=100>Cod </th>"; // th -> coluna
	
	echo "<th width=100>Nome  </th>"; // th -> coluna
	echo "<th width=100>Usuario </th>";
	echo "<th width=200>Departamento </th>";
    echo "<th width=150>Perfil </th>"; 
	echo "<th width=50>Alterar</th>";
	echo "</tr>";

	$option=5; // parâmetro usado na pagina editar.php
	
	while ($linha=mysql_fetch_array($resultado)){
	
		$codigo=$linha["cod_funcao"]; // campo chave de busca
				
		$campo1=$linha["nome"]; // campo1
		$campo2=$linha["cod_usuario"];   //campo2
		$campo3=$linha["cod_dpto"];    //campo3
		$campo4=$linha["perfil_usuario"];//campo4
		
		echo "<tr>"; // row = linha
		
		echo "<th width=15>$codigo&nbsp;</th>";   //nao permitir que o código seja alterado
		
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=100>$campo2&nbsp;</th>";
		echo "<th width=200>$campo3&nbsp;</th>";
		echo "<th width=150>$campo4&nbsp;</th>";

		echo "<th width=50><a href='editar.php?opcao=$option&id=$codigo'>Alterar</a><br></th>";

		echo "</tr>";
		echo "<br>";
	}
		
	echo "</table>";
	
?>

</p>
<p><a href="/sysco/MenuAdm.php" target="_blank">Retornar Menu</a></p>
</body>
</html>
	