<html>
<head>
<title>Movimenta&ccedil;&atilde;o</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>
<body>

<?php require_once "conecta.php"; ?>
<?php
   $cod_movimentacao = $HTTP_POST_VARS["cod_movimentacao"];
   $imagem = $HTTP_POST_VARS["imagem"];

	list($width, $height) = getimagesize($_FILES['upload_imagem']['tmp_name']);



	if (!eregi("^image\/(pjpeg|jpeg|gif)$", $_FILES['upload_imagem']['type']))
	
	{      
     ?>
           <script language="javascript">
		   alert("Tipo de arquivo nao permitido!\nApenas JPG ou GIF.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
	}

	elseif($width > 600 || $height > 600)

    {
     ?>
           <script language="javascript">
		   alert("Imagem muito grande!\nTem que ter no maximo 600 X 120 pixels.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
    }

	elseif ($_FILES['upload_imagem']['size'] > 20000000)

	{
     ?>
           <script language="javascript">
		   alert("Arquivo muito grande!\nTem que ter ate 100k.");
		   window.history.go(-1);
		   stop;
		   </script>
	<?php
	}

	else
	{
          $cripto = substr(md5(uniqid(time())), 0, 10);

          $imagem = $_FILES['upload_imagem']['name'];

          $imagem_final = $cripto.$imagem;

          move_uploaded_file($_FILES['upload_imagem']['tmp_name'],"fotos/".$imagem_final);

          $caminho_foto = $imagem_final;
	
    $alterar = "UPDATE movimentacao SET imagem = 'fotos/$caminho_foto' WHERE cod_movimentacao ='$cod_movimentacao'";
	
	
	$alterar=mysql_query($alterar) or die (mysql_error());	
	
	echo"Imagem Inserida com Sucesso!!";

	}

?>
<center><div align="center" class="copyright"><a href="/sysco/menuGerente.php" title="Solicitar Acesso" target="_parent">Voltar</a></div></center>

</body>
</html>