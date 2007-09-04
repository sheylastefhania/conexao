<? 
session_start();
// é necessário destruir cada variavel criada por questao de segurança, caso contrário se a variável de logon nao for destruída, a pessoa nao estará deslogada, e qqer um que abrir o mesmo site aind estará logada.

unset($_SESSION[usuario]);
session_destroy();

echo "<h1> Vc está desconectado !</h1>";

echo "<i> Obrigado por utilizar o SYSCO !</i>";


?>