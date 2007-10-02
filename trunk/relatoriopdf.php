<?php
define('FPDF_FONTPATH','font/');
require('fpdf153/fpdf.php');
include("conecta.php");



switch($opcao){
//---------------------------------------------------------
case '1':// acesso: relatorio de acesso dos usuarios por data


$busca="SELECT * FROM acesso where datacesso between ('$data1') and ('$data2')"; 
    
	
$result=mysql_query($busca) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());


$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();

// ------TITULO DO RELATORIO

$pdf->SetY(5);
$pdf->SetFont('Arial','I',14);
$pdf->Cell(10, 10, ":: RELATORIO DE ACESSO DOS USUARIOS POR DATA :: ", 10,10 );
$pdf->ln();

//------CABECALHOS DAS COLUNAS
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,'IP');
$pdf->SetX(35); //POSICAO DO CABECALHO 
$pdf->Cell(60,5,'Usuario');
$pdf->SetX(70); //POSICAO DO CABECALHO
$pdf->Cell(40,5,'Data');
$pdf->SetX(107); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Hora');

//------REGISTROS

while($resultado = mysql_fetch_array($result)){
	$pdf->ln();
	$pdf->Cell(40,5,$resultado[IP]);
	$pdf->SetX(35);
	$pdf->Cell(60,5,$resultado[usuario]);
	$pdf->SetX(70);
	$pdf->Cell(40,5,$resultado[datacesso]);
	$pdf->SetX(107);
	$pdf->Cell(40,5,$resultado[hora]);
}
$pdf->Output();

break;
//------------------------------------------------------
case '2': // acesso : relatorio ordenado pde acessi dos usuarios por usuarios

$busca="SELECT * FROM acesso WHERE usuario=('$usu')"; 
    
	
$result=mysql_query($busca) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());


$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();

// ------TITULO DO RELATORIO

$pdf->SetY(5);
$pdf->SetFont('Arial','I',14);
$pdf->Cell(10, 10, ":: RELATORIO DE ACESSO DOS USUARIOS :: ", 10,10 );
$pdf->ln();

//------CABECALHOS DAS COLUNAS
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,'IP');
$pdf->SetX(35); //POSICAO DO CABECALHO 
$pdf->Cell(60,5,'Usuario');
$pdf->SetX(70); //POSICAO DO CABECALHO
$pdf->Cell(40,5,'Data');
$pdf->SetX(107); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Hora');

//------REGISTROS

while($resultado = mysql_fetch_array($result)){
	$pdf->ln();
	$pdf->Cell(40,5,$resultado[IP]);
	$pdf->SetX(35);
	$pdf->Cell(60,5,$resultado[usuario]);
	$pdf->SetX(70);
	$pdf->Cell(40,5,$resultado[datacesso]);
	$pdf->SetX(107);
	$pdf->Cell(40,5,$resultado[hora]);
}
$pdf->Output();


break;

//-----------------------------------------
case '3': //departamentos: relatorio de acesso geral 


$busca="SELECT * FROM acesso ORDER BY datacesso"; 
    
	
$result=mysql_query($busca) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());


$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();

// ------TITULO DO RELATORIO

$pdf->SetY(5);
$pdf->SetFont('Arial','I',14);
$pdf->Cell(10, 10, ":: RELATORIO DE ACESSO DOS USUARIOS POR USUARIO:: ", 10,10 );
$pdf->ln();

//------CABECALHOS DAS COLUNAS
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,'IP');
$pdf->SetX(35); //POSICAO DO CABECALHO 
$pdf->Cell(60,5,'Usuario');
$pdf->SetX(70); //POSICAO DO CABECALHO
$pdf->Cell(40,5,'Data');
$pdf->SetX(107); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Hora');

//------REGISTROS

while($resultado = mysql_fetch_array($result)){
	$pdf->ln();
	$pdf->Cell(40,5,$resultado[IP]);
	$pdf->SetX(35);
	$pdf->Cell(60,5,$resultado[usuario]);
	$pdf->SetX(70);
	$pdf->Cell(40,5,$resultado[datacesso]);
	$pdf->SetX(107);
	$pdf->Cell(40,5,$resultado[hora]);
}
$pdf->Output();

break;
//-------------------------------
case '4': // relatorio usuarios por departamento

$busca= "SELECT * FROM funcao WHERE cod_dpto=('$dpto')"; 
    
	
$result=mysql_query($busca) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());


$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();

// ------TITULO DO RELATORIO

$pdf->SetY(5);
$pdf->SetFont('Arial','I',14);
$pdf->Cell(10, 10, ":: RELATORIO DE USUARIOS POR DEPARTAMENTO :: ", 10,10 );
$pdf->ln();

//------CABECALHOS DAS COLUNAS
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,'Codigo');
$pdf->SetX(35); //POSICAO DO CABECALHO 
$pdf->Cell(60,5,'Usuario');
$pdf->SetX(70); //POSICAO DO CABECALHO
$pdf->Cell(40,5,'Departamento');
$pdf->SetX(107); // POSICAO DO CABECALHO
//$pdf->Cell(40,5,'Hora');

//------REGISTROS

while($resultado = mysql_fetch_array($result)){
	$pdf->ln();
	$pdf->Cell(40,5,$resultado[cod_funcao]);
	$pdf->SetX(35);
	$pdf->Cell(60,5,$resultado[cod_usuario]);
	$pdf->SetX(70);
	$pdf->Cell(40,5,$resultado[cod_dpto]);
	$pdf->SetX(107);

}
$pdf->Output();

break;

//--------------------------------
case '5': // departamentos: relatorio geral ordenado por departamento

$busca= "SELECT * FROM funcao ORDER BY cod_dpto"; 
    
	
$result=mysql_query($busca) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());


$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();

// ------TITULO DO RELATORIO

$pdf->SetY(5);
$pdf->SetFont('Arial','I',14);
$pdf->Cell(10, 10, ":: RELATORIO DE USUARIOS POR DEPARTAMENTO :: ", 10,10 );
$pdf->ln();

//------CABECALHOS DAS COLUNAS
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,'Codigo');
$pdf->SetX(35); //POSICAO DO CABECALHO 
$pdf->Cell(60,5,'Usuario');
$pdf->SetX(70); //POSICAO DO CABECALHO
$pdf->Cell(40,5,'Departamento');
$pdf->SetX(107); // POSICAO DO CABECALHO
//$pdf->Cell(40,5,'Hora');

//------REGISTROS

while($resultado = mysql_fetch_array($result)){
	$pdf->ln();
	$pdf->Cell(40,5,$resultado[cod_funcao]);
	$pdf->SetX(35);
	$pdf->Cell(60,5,$resultado[cod_usuario]);
	$pdf->SetX(70);
	$pdf->Cell(40,5,$resultado[cod_dpto]);
	$pdf->SetX(107);

}
$pdf->Output();


break;
//--------------------------------
case '6': // 

$busca= "SELECT DISTINCT nome FROM departamento ORDER BY nome"; 
    
	
$result=mysql_query($busca) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());


$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();

// ------TITULO DO RELATORIO

$pdf->SetY(5);
$pdf->SetFont('Arial','I',14);
$pdf->Cell(10, 10, ":: RELATORIO DE USUARIOS POR DEPARTAMENTO :: ", 10,10 );
$pdf->ln();

//------CABECALHOS DAS COLUNAS
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,'Codigo');
$pdf->SetX(35); //POSICAO DO CABECALHO 
$pdf->Cell(60,5,'Usuario');
$pdf->SetX(70); //POSICAO DO CABECALHO
$pdf->Cell(40,5,'Departamento');
$pdf->SetX(107); // POSICAO DO CABECALHO
//$pdf->Cell(40,5,'Hora');

//------REGISTROS

while($resultado = mysql_fetch_array($result)){
	$pdf->ln();
	$pdf->Cell(40,5,$resultado[cod_funcao]);
	$pdf->SetX(35);
	$pdf->Cell(60,5,$resultado[cod_usuario]);
	$pdf->SetX(70);
	$pdf->Cell(40,5,$resultado[cod_dpto]);
	$pdf->SetX(107);

}
$pdf->Output();

break;

//--------------------------------
case '7': // 

$busca= "SELECT departamento.nome as departamentonome,conta.cod_depto,conta.nome,saldo FROM conta,departamento WHERE conta.nome=('$verconta')  and  conta.cod_depto=departamento.cod_depto";
 
	
$result=mysql_query($busca) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());


$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();

// ------TITULO DO RELATORIO

$pdf->SetY(5);
$pdf->SetFont('Arial','I',14);
$pdf->Cell(10, 10, ":: EXTRATO DE CONTAS POR DEPARTAMENTO :: ", 10,10 );
$pdf->ln();

//------CABECALHOS DAS COLUNAS
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,'Nome');
$pdf->SetX(35); //POSICAO DO CABECALHO 
$pdf->Cell(60,5,'Saldo');
$pdf->SetX(70); //POSICAO DO CABECALHO
$pdf->Cell(40,5,'Departamento');
$pdf->SetX(107); // POSICAO DO CABECALHO
//$pdf->Cell(40,5,'Hora');

//------REGISTROS

while($resultado = mysql_fetch_array($result)){
	$pdf->ln();
	$pdf->Cell(40,5,$resultado[nome]);
	$pdf->SetX(35);
	$pdf->Cell(60,5,$resultado[saldo]);
	$pdf->SetX(70);
	$pdf->Cell(40,5,$resultado [departamentonome]);
	$pdf->SetX(107);

}
$pdf->Output();



break;

//--------------------------------
case '8': //  relatorio extrato de conta por periodo

$busca="select departamento.cod_depto,movimentacao.cod_movimentacao,movimentacao.valor ,movimentacao.data_movimentacao,funcdepto.cod_funcdepto,funcdepto.departamento AS nomedepto,funcdepto.funcionario,funcdepto.departamento,conta.cod_conta,conta.nome AS nomeconta,conta.saldo,conta.cod_depto  from movimentacao,funcdepto,conta,departamento WHERE beneficiado = cod_funcdepto and funcdepto.departamento=departamento.nome having conta.cod_depto=departamento.cod_depto AND conta.nome=('$verconta2') AND  data_movimentacao between ('$data1') and ('$data2')";	
	
	
$result=mysql_query($busca) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());


$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();

// ------TITULO DO RELATORIO

$pdf->SetY(5);
$pdf->SetFont('Arial','I',14);
$pdf->Cell(10, 10, ":: EXTRATO DE CONTA POR PERÍODO :: ", 10,10 );
$pdf->ln();

//------CABECALHOS DAS COLUNAS
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,'Conta');
$pdf->SetX(35); //POSICAO DO CABECALHO 
$pdf->Cell(60,5,'Valor');
$pdf->SetX(70); //POSICAO DO CABECALHO
$pdf->Cell(40,5,'Departamento');
$pdf->SetX(107); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Data');

//------REGISTROS

while($resultado = mysql_fetch_array($result)){
	$pdf->ln();
	$pdf->Cell(40,5,$resultado[nomeconta]);
	$pdf->SetX(35);
	$pdf->Cell(60,5,$resultado[valor]);
	$pdf->SetX(70);
	$pdf->Cell(40,5,$resultado[nomedepto]);
	$pdf->SetX(107);
	$pdf->Cell(40,5,$resultado[data_movimentacao]);
}
$pdf->Output();


break;

//--------------------------------
case '9': // 

$busca="SELECT conta.nome AS nomeconta,saldo,conta.cod_depto,departamento.cod_depto,departamento.nome AS nomedepto FROM conta,departamento WHERE conta.cod_depto=departamento.cod_depto ORDER BY departamento.nome";


$result=mysql_query($busca) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());


$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();

// ------TITULO DO RELATORIO

$pdf->SetY(5);
$pdf->SetFont('Arial','I',14);
$pdf->Cell(10, 10, ":: EXTRATO DE CONTA POR PERÍODO :: ", 10,10 );
$pdf->ln();

//------CABECALHOS DAS COLUNAS
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,'Conta');
$pdf->SetX(35); //POSICAO DO CABECALHO 
$pdf->Cell(60,5,'Valor');
$pdf->SetX(70); //POSICAO DO CABECALHO
$pdf->Cell(40,5,'Departamento');


//------REGISTROS

while($resultado = mysql_fetch_array($result)){
	$pdf->ln();
	$pdf->Cell(40,5,$resultado[nomeconta]);
	$pdf->SetX(35);
	$pdf->Cell(60,5,$resultado[saldo]);
	$pdf->SetX(70);
	$pdf->Cell(40,5,$resultado[nomedepto]);

}
$pdf->Output();


break;
//--------------------------------
case '10': //exibe relatrio de movimentacao por natureza ( Debito/Credito)

if ($vernatureza==''){

     $busca="SELECT * FROM movimentacao,categoria,funcdepto WHERE beneficiado=cod_funcdepto AND    categoria=cod_categoria ";

}else{

  $busca="SELECT * FROM movimentacao,categoria,funcdepto WHERE beneficiado=cod_funcdepto AND    categoria=cod_categoria HAVING natureza=('$vernatureza')";


}


$result=mysql_query($busca) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());


$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();

// ------TITULO DO RELATORIO

$pdf->SetY(5);
$pdf->SetFont('Arial','I',14);
$pdf->Cell(10, 10, ":: MOVIMENTACAO POR NATUREZA :: ", 10,10 );
$pdf->ln();

//------CABECALHOS DAS COLUNAS
 
 
 
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,'Valor');
$pdf->SetX(35); //POSICAO DO CABECALHO 
$pdf->Cell(60,5,'Natureza');
$pdf->SetX(70); //POSICAO DO CABECALHO
$pdf->Cell(40,5,'Funcionario');
$pdf->SetX(107); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Departamento');
$pdf->SetX(157); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Data');
$pdf->SetX(200); // POSICAO DO CABECALHO


//------REGISTROS

while($resultado = mysql_fetch_array($result)){
	$pdf->ln();
	$pdf->Cell(40,5,$resultado[valor]);
	$pdf->SetX(35);
	$pdf->Cell(60,5,$resultado[natureza]);
	$pdf->SetX(70);
	$pdf->Cell(40,5,$resultado[funcionario]);
	$pdf->SetX(107);
	$pdf->Cell(40,5,$resultado[departamento]);
	$pdf->SetX(157); 
	$pdf->Cell(40,5,$resultado[data_movimentacao]);
	$pdf->SetX(200); 


}
$pdf->Output();
   
break;


//--------------------------------
case '11': // exibe relatorio por tipo de operacao (CONFIRMADA/PREVISAO/TODAS)

if ($veroperacao==''){

     $busca="SELECT * FROM movimentacao,categoria,funcdepto WHERE beneficiado=cod_funcdepto AND categoria=cod_categoria ";

}else{

  $busca="SELECT * FROM movimentacao,categoria,funcdepto WHERE beneficiado=cod_funcdepto AND categoria=cod_categoria HAVING estado_operacao='$veroperacao";


}


$result=mysql_query($busca) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());


$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();

// ------TITULO DO RELATORIO

$pdf->SetY(5);
$pdf->SetFont('Arial','I',14);
$pdf->Cell(10, 10, ":: MOVIMENTACAO POR TIPO OPERACAO:: ", 10,10 );
$pdf->ln();

//------CABECALHOS DAS COLUNAS
 
 
 
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,'Valor');
$pdf->SetX(35); //POSICAO DO CABECALHO 
$pdf->Cell(60,5,'Natureza');
$pdf->SetX(70); //POSICAO DO CABECALHO
$pdf->Cell(40,5,'Funcionario');
$pdf->SetX(107); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Departamento');
$pdf->SetX(157); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Data');
$pdf->SetX(200); // POSICAO DO CABECALHO


//------REGISTROS

while($resultado = mysql_fetch_array($result)){
	$pdf->ln();
	$pdf->Cell(40,5,$resultado[valor]);
	$pdf->SetX(35);
	$pdf->Cell(60,5,$resultado[natureza]);
	$pdf->SetX(70);
	$pdf->Cell(40,5,$resultado[funcionario]);
	$pdf->SetX(107);
	$pdf->Cell(40,5,$resultado[departamento]);
	$pdf->SetX(157); 
	$pdf->Cell(40,5,$resultado[data_movimentacao]);
	$pdf->SetX(200); 


}
$pdf->Output();

break;
//--------------------------------
case '12': //exibe relatorio de movimentacao financeiras por beneficiado 

$busca="SELECT * FROM movimentacao, funcdepto,categoria WHERE beneficiado=cod_funcdepto AND movimentacao.categoria=categoria.cod_categoria ORDER BY data_movimentacao,beneficiado";


$result=mysql_query($busca) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());


$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();

// ------TITULO DO RELATORIO

$pdf->SetY(5);
$pdf->SetFont('Arial','I',14);
$pdf->Cell(10, 10, ":: MOVIMENTACAO FINANCEIRO POR BENEFICIADO :: ", 10,10 );
$pdf->ln();

//------CABECALHOS DAS COLUNAS
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,'Beneficiado');
$pdf->SetX(35); //POSICAO DO CABECALHO 
$pdf->Cell(60,5,'Departamento');
$pdf->SetX(85); //POSICAO DO CABECALHO
$pdf->Cell(40,5,'Valor');
$pdf->SetX(107); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Natureza');
$pdf->SetX(127); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Data');
$pdf->SetX(157); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Operacao');
$pdf->SetX(187); // POSICAO DO CABECALHO




//------REGISTROS

while($resultado = mysql_fetch_array($result)){
	$pdf->ln();

	$pdf->Cell(40,5,$resultado[funcionario]);
	$pdf->SetX(35);
	$pdf->Cell(60,5,$resultado[departamento]);
	$pdf->SetX(85);
	$pdf->Cell(40,5,$resultado[valor]);
	$pdf->SetX(110);
	$pdf->Cell(40,5,$resultado[natureza]);
	$pdf->SetX(127); 
	$pdf->Cell(40,5,$resultado[data_movimentacao]);
	$pdf->SetX(157); 
	$pdf->Cell(40,5,$resultado[estado_operacao]);
	$pdf->SetX(187); 
}
$pdf->Output();






break;
//--------------------------------
case '13': //exibe relatorio de movimentacao financeiras por data de inclusao


$busca="SELECT * FROM movimentacao, funcdepto,categoria WHERE beneficiado=cod_funcdepto AND movimentacao.categoria=categoria.cod_categoria ORDER BY data_movimentacao,beneficiado";


$result=mysql_query($busca) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());


$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();

// ------TITULO DO RELATORIO

$pdf->SetY(5);
$pdf->SetFont('Arial','I',14);
$pdf->Cell(10, 10, ":: MOVIMENTACAO FINANCEIRO POR DATA  :: ", 10,10 );
$pdf->ln();

//------CABECALHOS DAS COLUNAS
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,'Beneficiado');
$pdf->SetX(35); //POSICAO DO CABECALHO 
$pdf->Cell(60,5,'Departamento');
$pdf->SetX(85); //POSICAO DO CABECALHO
$pdf->Cell(40,5,'Valor');
$pdf->SetX(107); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Natureza');
$pdf->SetX(127); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Data');
$pdf->SetX(157); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Operacao');
$pdf->SetX(187); // POSICAO DO CABECALHO




//------REGISTROS

while($resultado = mysql_fetch_array($result)){
	$pdf->ln();

	$pdf->Cell(40,5,$resultado[funcionario]);
	$pdf->SetX(35);
	$pdf->Cell(60,5,$resultado[departamento]);
	$pdf->SetX(85);
	$pdf->Cell(40,5,$resultado[valor]);
	$pdf->SetX(110);
	$pdf->Cell(40,5,$resultado[natureza]);
	$pdf->SetX(127); 
	$pdf->Cell(40,5,$resultado[data_movimentacao]);
	$pdf->SetX(157); 
	$pdf->Cell(40,5,$resultado[estado_operacao]);
	$pdf->SetX(187); 
}
$pdf->Output();



break;
//--------------------------------
case '14': //exibe relatorio de movimentacao financeiras por departamento

$busca="SELECT * FROM movimentacao, funcdepto,categoria,associadepto WHERE beneficiado=cod_funcdepto AND movimentacao.categoria=categoria.cod_categoria AND departamento=deptosuperior ORDER BY departamento";


$result=mysql_query($busca) or die ("Nao foi possivel realizar a consulta ao banco de dados".mysql_error());


$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();

// ------TITULO DO RELATORIO

$pdf->SetY(5);
$pdf->SetFont('Arial','I',14);
$pdf->Cell(10, 10, ":: MOVIMENTACAO FINANCEIRO POR DEPARTAMENTO  :: ", 10,10 );
$pdf->ln();

//------CABECALHOS DAS COLUNAS
 
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,'Departamento');
$pdf->SetX(45); //POSICAO DO CABECALHO 
$pdf->Cell(60,5,'Depto Subordinado');
$pdf->SetX(85); //POSICAO DO CABECALHO
$pdf->Cell(40,5,'Valor');
$pdf->SetX(107); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Natureza');
$pdf->SetX(127); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Data');
$pdf->SetX(157); // POSICAO DO CABECALHO
$pdf->Cell(40,5,'Operacao');
$pdf->SetX(187); // POSICAO DO CABECALHO




//------REGISTROS

while($resultado = mysql_fetch_array($result)){
	$pdf->ln();

	$pdf->Cell(40,5,$resultado[departamento]);
	$pdf->SetX(45);
	$pdf->Cell(60,5,$resultado[deptosubordinado]);
	$pdf->SetX(85);
	$pdf->Cell(40,5,$resultado[valor]);
	$pdf->SetX(110);
	$pdf->Cell(40,5,$resultado[natureza]);
	$pdf->SetX(127); 
	$pdf->Cell(40,5,$resultado[data_movimentacao]);
	$pdf->SetX(157); 
	$pdf->Cell(40,5,$resultado[estado_operacao]);
	$pdf->SetX(187); 
}
$pdf->Output();



break;


}
?>
</body>
</html>