<?phpinclude("cabecalho.php");include("datebase.php");?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html xmlns="http://www.w3.org/1999/html"><head><meta charset="utf-8"><link href="estilo_forum.css" rel="stylesheet" type="text/css" media="screen" /><title>Forum-Login</title></head><body><div id="form_registo">	<form id="form_registo" name="form_registo" action="verifica_login.php"  method="GET">		<table  width='800 px' border='1' align='center' class='tabela_baixo' cellspacing=0>			<tr class='titulos'>		<td colspan="2" align="center"><h3>Login panel </h3>	</td>	<div class="registo">	    <tr>        <td align="right">Username:</td>		<td> <input name="nome" placeholder="Please enter your username " type="text" size="30" maxlength="20" required="10" /></td>    </tr>	<tr>		<td align="right">Password:</td>		<td><input name="password" placeholder="Please write your password" type="password" size="30" maxlength="30" required="20"/></td>	</tr>	</div>	<tr>		<td align="right">			<input type="submit" name="login" id="login" value="Log in"/>		</td>	</tr>    </tr></table></form></div></body></html>