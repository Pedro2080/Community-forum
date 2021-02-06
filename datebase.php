<?php

/*$host = "Localhost";
$user ="root";
$pass = "lino20";
$banco ="bazyforum";


//estabelecer ligacao a base de dados
$conexao = mysqli_connect($host, $user, $pass) or die (mysql_error());

mysql_select_db($banco, $conexao) or die (mysql_error($conexao));

?>*/

$servidor ="localhost";
$base_dados= "grupo";
$nome_administrador="root";
$password_administrador ="";

$ligacao =mysqli_connect($servidor,$nome_administrador,$password_administrador,$base_dados);

// Conectando a base de dados

if(!$ligacao) {
 die ("Nao foi possivel ligar a base de dados").mysqli_connect_error();

}
else{

echo "Coxecao com exito";

}
//mysqli_close($ligacao);


?>

