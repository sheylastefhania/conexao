<html>
<head>
<title>SYSCO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<body>
<?php

$dir="./imagem/";//caminho no caso de um window// para onde vai as imagem */

/* $caminho_mysql="localhost/upload/imagem/";caminho para o mysql achar quando vc for chamacomentei $caminho-mysql e no sei o seu caminho ai */

$ball=$_FILES['ball']['name'];//recebendo a imagem

$caminho1=$dir.$ball;//caminho com nome da imagem e local para guardar

if(move_uploaded_file($_FILES['ball']['tmp_name'],$caminho1))//aqui nada especial so movo a tmp_name dando caminho

{list($largura,$altura,$tipo)=getimagesize($caminho1);
/* baseado no caminho do move_upload($caminho1)tu sabe que list faz ???
/essa funcao getimagesize ele tem uma array com as informacoes deimagemela retorna quatros elementos de uma imagem0-largura1-altura2-tipo ser e uma jpg ou png gifdentro de tipo o gif e 1,jpg 2 e 3 png$atributos tem a largura e altura da imagementendeuseu quiser sabe se a imagem e um jpge so fazer*if($tipo=2) {echo $imagem1 ."is jpg";exit ();
} */

$imagem = imagecreatefromjpeg($caminho1);

// aqui eu pego a imagem no caminho e jogo na memoria$Thumbnail = imagecreatetruecolor(75, 75);

// diminuir a imagem preservado as cores e diminiudo a imagemimagecopyresampled($Thumbnail, $imagem, 0, 0, 0, 0, 75, 75, $largura,$altura);
//sample da imagem com os tamanho 75 x75

imagejpeg($Thumbnail,$dir.'/pequena_'.$ball);//$dir esta la em cima esqueceu aqui a imagem vai pequena
// criando a imagem$pequena=$caminho_mysql.'pequena_'.$ball;
/*aqui eu criei uma variavel para o mysql ja que o caminho final e la
gere a imagem e coloco no Diretorio de imageme ganhar uma nova imagem algo tipo pequena_image que veio para mim.jpg*/

}

$image=$_FILES['arquivo'];

//aqui eu recebo a imagem olha o formulario la arquivo []

for($i=0; $i < sizeof($image);$i++)
{
  /* o bando vai ser organizado aquivirando um array manero e claro depois que eucoloque a minha matriz[] */
  $nome=$_FILES ['arquivo']['name'][$i];
  $tamanho=$_FILES ['arquivo']['size'][$i];
  $tipo=$_FILES ['arquivo']['type'][$i];
  $tmpname=$_FILES ['arquivo']['tmp_name'][$i];
  $matriz[]=$nome;/* pq eu precisava desse campo com o array livrepara os campo do mysql*/
  $caminho=$dir.$nome;

  if($tamanho > 0 && strlen($nome) > 1)

  //aqui e natural no e ???
  //ver se tem algo pra eu movei baseado no campo
  //de repente o cara coloco um imagem no ultimo campo
  //eu to ferrado para jogar{
  // endereco completo e o caminho para onde vai as imagem

    if(move_uploaded_file($tmpname,$caminho)){
      echo 'imagem' . ($i+1) . ' enviada.<br/>';/* Faz contagem baseada no campopq $i+1 pq veja a minha matriz como esta organizadause o var_dump para melhor referencia */
    }
//primeiro if fechado

//segundo if fechado
}

//fecho for

$conexao=mysql_connect("localhost", "root", "vertrigo") or die ("Configuracao de banco de dados errada");
$db=mysql_select_db("test") or die ("Banco de Dados inexistente");// aqui e funcao conexao do banco

$vamos="Insert into produto (id,foto1,foto2,foto3,foto4,pequena)VALUES('','$ball','$matriz[0]','$matriz[1]','$matriz[2]','$pequena')";
// como geral gosta de separa
$vai=mysql_query($vamos)or die("Ocorreu um erro aqui . . .");
/*e la as fotos vao p/ mysql
 como estamos trabalhando ???
eu separei para geral pode ideia pra conseguir altera
qualquer duvida e so dizer eu podia te feito tudo no for

*/
php?>
</body>
</html>