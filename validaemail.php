<html>
<head>
<title>SYSCO</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="css/sysco.css">
</head>

<body>
<?

$email = $_POST['email'];
if(ereg("@", $email)){ echo 'Voce nao digitou um email valido!'; }
?>
</body>
</html>