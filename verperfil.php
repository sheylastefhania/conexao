<?
session_start();
include "conecta.php";

$sql= "SELECT * FROM funcao WHERE cod_funcao='$idfuncao'";
$resultado=mysql_query($sql) or die ("Não foi possível realizar a consulta ao banco de dados".mysql_error());

$linha=mysql_fetch_array($resultado);

$idfuncao=$linha["cod_funcao"];
$perfil=$linha["perfil_usuario"];

//session_start();

if ($perfil=="ADMINISTRADOR") {
   

  $_SESSION[$perfilusu]="ADMINISTRADOR";
 header ("Location: MenuAdm.php");

}

if ($perfil=="AGENTE FINANCEIRO") {

$_SESSION[$perfilusu]="AGENTE FINANCEIRO";
header ("Location: MenuAgente.php");

}

if ($perfil=="GERENTE FINANCEIRO") {

  $_SESSION[$perfilusu]="GERENTE FINANCEIRO";
  header ("Location: MenuGerente.php");

}

echo  $_SESSION[$perfilusu];

?>