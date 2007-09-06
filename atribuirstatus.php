<? session_start();?>

::ATRIBUIR STATUS AO USUARIO


<?
// NESTE MODULO SERA ESCOLHIDO QUAL FUNCIONARIO SE QUER ATRIBUIR

 if(($_SESSION[$perfilusu])=="ADMINISTRADOR") {

    include "conecta.php";

	$sql= "SELECT * FROM funcionario,funcdepto WHERE administrador='NAO' AND ativo='sim' having funcionario.nome=funcdepto.funcionario";
	
	$resultado=mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados".mysql_error());
	
	
	echo "<br>";
	echo "<br>";
	echo "<table with=740 border=1 cellpading=1 cellspacing=1>";
	echo "<tr>";  // row --> linha
	
	echo "<th width=100>Código do Usuario</th>"; // th -> coluna
	
	echo "<th width=100>Nome </th>";
    echo "<th width=50>CPF </th>";
	echo "<th width=100>Administrador </th>";
	echo "<th width=50>Ativo</th>";
	echo "<th width=100>Departamento</th>";
	echo "<th width=50>Atribuir</th>";
	echo "</tr>";

	$option=6; // parâmetro usado na pagina de editar.php
	
	while ($linha=mysql_fetch_array($resultado)){
	
		$codigo=$linha["cod_func"]; // campo chave de busca
				
		$campo1=$linha["nome"]; // campo1
		$campo2=$linha["cpf"];    //campo2
		$campo3=$linha["administrador"];    //campo3
		$campo4=$linha["ativo"];    //campo4
		$campo5=$linha["departamento"]; 
		

		
		echo "<tr>"; // row = linha
		
		echo "<th width=15>$codigo&nbsp;</th>";   //nao permitir que o código seja alterado
		
		echo "<th width=100>$campo1&nbsp;</th>";
		echo "<th width=50>$campo2&nbsp;</th>";
		echo "<th width=100>$campo3&nbsp;</th>";
		echo "<th width=50>$campo4&nbsp;</th>";
    	echo "<th width=100>$campo5&nbsp;</th>";
		
       echo "<input type='hidden' name='depto' value='$campo5'>";
		echo "<th width=50><a href='editar.php?opcao=$option&id=$codigo'>Atribuir</a><br></th>";
		
		
	    

		echo "</tr>";
		echo "<br>";
		}
		
	echo "</table>";

}elseif ($_SESSION[$perfilusu]=="") {
   echo "<i>Voce precisa estar logado para utilizar esta página...</i>";

}
else if ($_SESSION[$perfilusu]<>"ADMINISTRADOR"){

    echo "<i>Voce precisa ter o perfil de administrador para utilizar esta página...</i>";
}
//echo "<p><a href="/sysco/MenuAdm.php" target="_blank">Retornar Menu</a></p>";
?>