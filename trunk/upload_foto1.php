<html>
<head>
<title>Memorando</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>

<body>
<blockquote><div align="center" class="td_title">Inserindo imagem ! ! !<br><br>
<i>As imagens devem estar no formato jpg e ter no maximo 100Kb . . .</i></div></blockquote>
<form action="upload_foto2.php" method="post" enctype="multipart/form-data" name="form1">
  <input name="upload_imagem" type="file" id="upload_imagem">
  <br>
  <input name="cod_memo" type="hidden" id="cod_memo" value="<?php echo $HTTP_GET_VARS['cod_memo']; ?>">
  <input name="imagem" type="hidden" id="imagem" value="<?php echo $HTTP_GET_VARS['imagem']; ?>"><br>
  <center><input type="submit" name="Submit" value="Enviar"></center>
</form>
</body>
</html>
