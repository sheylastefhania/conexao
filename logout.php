<? 
session_start();
// � necess�rio destruir cada variavel criada por questao de seguran�a, caso contr�rio se a vari�vel de logon nao for destru�da, a pessoa nao estar� deslogada, e qqer um que abrir o mesmo site aind estar� logada.

unset($_SESSION[usuario]);
session_destroy();

echo "<h1> Vc est� desconectado !</h1>";

echo "<i> Obrigado por utilizar o SYSCO !</i>";


?>