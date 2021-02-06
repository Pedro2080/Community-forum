<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/html">
<head>
<meta charset="utf-8">
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="estilo_forum.css" rel="stylesheet" type="text/css" media="screen" />
<title>Menu Admin</title>
</head>
<body>

<?php
include("datebase.php");
include("cabecalho.php");

?>
<table  width='800 px' border='1' align='center' class='tabela_baixo' cellspacing= 0>

<tr>
<td class="utilizadores" align="center"><h1>Menu administrator</h1></td>
</tr>

<tr>
<td><a href='nova_categoria.php'><h4>Create a new category</h4></a></td>
</tr>

<tr>
<td><a href='apagar_categoria.php'><h4>Eliminate the existing category</h4></a></td>
</tr>

<tr>
<td><a href='novo_forum.php'><h4>Create a new forum</h4></a></td>
</tr>

<tr>
<td><a href='validar_utilizador.php'><h4>Member validation</h4></a></td>
</tr>

<tr>
<td><a href='ver_utilizadores.php'><h4>View current users</h4></a></td>
</tr>


    </table>
</body>
</html>