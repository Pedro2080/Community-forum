<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
<meta charset="utf-8">
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="estilo_forum.css" rel="stylesheet" type="text/css" media="screen" />
<title>Category</title>
</head>
<body>
<?php
include ("datebase.php");
include("cabecalho.php");

//verificar se o botao foi clicado  para registar
if(isset($_REQUEST['criar'])){
$sql_category = "INSERT INTO category (category_name) VALUES('".$_POST['category_name']."');";
mysqli_query($ligacao,$sql_category);
header("Location: menu_admin.php");
}

else{
?>
//iniciar construcao do formulario
echo "<table width='800 px' border='1' align='center' class='tabela_baixo' cellspacing=50>";
<form id="form_registo" name="form_registo"  method="POST" action="nova_categoria.php">
<tr><td><h4>Category title: </h4></td>
<td><input type="text" name="category_name"></td>
</tr>

<tr>
<td></td>

<td><input type="submit" name="criar" value="Sumit">
<input type="reset" name="apagar" value="Delete"></td>
</tr>
    </table>
 </form>
<?php
}
?>
</body>
</html>