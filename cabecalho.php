<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//PL" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/html">
<head>
<meta charset="utf-8">
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="estilo_forum.css" rel="stylesheet" type="text/css" media="screen" />
<title>Forum</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo_forum.css" rel="stylesheet" />

</head>
<body>
<table class="tabela_cima" width="800px" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td class="topo" colspan="5"><h1>Internet forum </h1></td>
</tr>


<?php

//iniciar a sessao
session_start();
//verificar se esta atribuido o nivel de utilizador
if(isset($_SESSION['user_level']) == TRUE){
    echo'</td>';
    echo'<td>Welcome! '.$_SESSION['username'].'</td>';
    echo '<td><a href="index.php">Home Page </td>';


if(($_SESSION['user_level']) =='1'){
echo '<td><a href="menu_admin.php">Menu Admin</td>';}
    echo'<td><a href="logout.php">Logout</td>';
}

else{
echo'<td><a href="login.php"><h3>Log in</h3></a></td>';
echo'<td><a href="registar_utilizador.php"><h3>Register</h3></a></td>';
}
?>



</table>
<br/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>