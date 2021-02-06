
<?php
//ligacao a base de dados e cabecalho
include("datebase.php");
include("cabecalho.php");

$_POST["nickname"];
$nickname = $_POST["nickname"];

$_POST["email"];
$email = $_POST["email"];

$_POST["password"];
$password = $_POST["password"];


//verificar se ja foi clicado o botao de registar topico (submit)


if(isset($_REQUEST['registar'])){
    //verificar se os campos do formulario estao preenchidos
    if (!empty($_POST) AND (empty($_POST['nickname']) OR empty($_POST['password'])))
    {
        echo "<table class='tabela_baixo' align='center' width='800px'><tr><td></td>";
        echo "<td><a href='registar_utilizador.php'>Click and try again!</a></td> ";
    }
//verificar se ja existe um utilizador registado com o mesmo nome
$nickname = $_POST['nickname'];
$sql = "SELECT * FROM users WHERE username = '$nickname'";

$consulta=mysqli_query($ligacao,$sql);
$resultado=mysqli_num_rows($consulta);

    //se ja existe utilizador, apresenta uma mensagens de erro
if($resultado != 0){
 echo "<table class='tabela_baixo' align='center' width='800px'><tr><td>There is already a user with this login name! please try another name</td></tr>";
    echo "<td><a href='registar_utilizador.php'>Try again </a></td>";

}
else{
    //se nao existe utilizador com o mesmo nome, cria novo registo 
    
   	 $sql2 ="INSERT INTO users(username, password, email,user_state, user_level) 
   			VALUES ('$nickname','$password','$email','N','2')";
    $consulta2 = mysqli_query($ligacao,$sql2);
    echo "<table class='tabela_baixo' align='center' width='800px'><tr><td>Thanks you for register! please wait for administrator validation</td></tr>";
    echo "<td><a href='index.php'>Click here to continue </a></td>";
}
}


?>


<!---construir o formulario de registo--->
<div id="form_registo">
<form name="form_registo" action="registar_utilizador.php" method="post">

    <table  width='800 px' border='1' align='center' class='tabela_baixo' cellspacing=0>
        <tr class='titulos'>
            <td colspan="2" align="center"><h3>Enter your registration details</h3></td>
			</tr>
			<div class="registo">
		<tr>
			<td align="right">Username:</td>
			<td> <input name="nickname" placeholder="Please enter your nickname " type="text" size="30" maxlength="20" required/></td>
		</tr>
		<tr>
			<td align="right">Email: </td>
			<td><input name="email" placeholder="Please write your email addres " type="email" size="30" maxlength="30" required/></td>
		</tr>
		<tr>
			<td align="right">Password:</td>
			<td><input name="password" placeholder="Please write your password" type="password" size="30" maxlength="30" required/></td>
		</tr>
		<tr>
			<td align="right">Re-Password:</td>
			<td><input name="repassword" placeholder="please confirm your password" type="password" size="30" maxlength="30" required/></td>
		</tr>
		</div>
		<tr>
            <td align="right" valign="right"><input type="submit" name="registar" value="Sign up"/>
            
        </tr>

	</table>

</form>

</div>

