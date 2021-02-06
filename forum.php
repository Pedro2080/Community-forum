<?php
//ligacao a base de dados e cabecalho
include ("datebase.php");
include ("cabecalho.php");
//verificar o nivel de utilizador e atribuir variavel
$nivel = 0;
if(isset($_SESSION['user_level'])) 
{
$nivel= $_SESSION['user_level'];
}

//atribuir variaveis que contem a identificacao do forum
$id_forum = $_GET['id_forum'];

//procurar identificacao do forum
$sql = "SELECT * FROM forum WHERE id_forum= '.$id_forum.'";
$consulta = mysqli_query($ligacao,$sql);
$resultado = mysqli_fetch_assoc($consulta);
echo "<table width ='800 px' border='1' align='center' class='tabela_baixo' cellspacing=0>";
echo"<tr class='titulos'><td colspan=2>";

//apresenta o nome (tema) do forum
echo "Theme forum: ".$resultado['forum_name']."</td>";

//procurar tópico associados ao forum selecianado
$sql_topics="SELECT MAX(date_topic) AS last_date, topics.* ,users.* 
	FROM topics, users WHERE topics.id_user = users.id_user AND topics.id_forum ='.$id_forum.' GROUP BY topics.id_topic ORDER BY last_date DESC";
//realizar consulta
$consulta_topics= mysqli_query($ligacao,$sql_topics);
$resultado_topics= mysqli_num_rows($consulta_topics); // A função mysqli_num_rows () retorna o número de linhas em um conjunto de resultados.
if($resultado_topics == 1){
//caso nao existam topicos pra mostrar, informa o utilizador
echo "<table class='tabela_baixo' align='center' width='800 px'><tr><td>There are no topics to display!</td>";
echo "<td><a href='novo_topico.php?id_forum=".$id_forum."'>New topic</a></td>";
}

//caso existam topicos, elaborar tabela onde sao mostrados
else{
echo "<table class='tabela_baixo' align='center' width='800 px'>";
echo "<td><a href='novo_topico.php?id_forum = ". $id_forum . "'>New topic</a></td>";
echo"<tr>";
echo"<th>Topic title</th>";
echo"<th>All the answers</th>";
echo"<th>Author</th>";
echo"<th>Date of topic</th>";
echo"</tr>";

// A função mysqli_fetch_assoc() é usada para retornar uma matriz associativa representando a próxima linha no conjunto de resultados representado pelo parâmetro result, aonde cada chave representa o nome de uma coluna do conjunto de resultados.
while($valor_topic = mysqli_fetch_assoc($consulta_topics)){
$sql_message = "SELECT id_msg FROM messages WHERE id_msg = ".$valor_topic['id_topic'];
$consulta_message = mysqli_query($ligacao,$sql_message);
$total_msg = mysqli_num_rows($consulta_message);
$date_topic=date("D j m Y G:i", strtotime($valor_topic['date_topic'])); // strtotime A função espera que seja informada uma string 
$dividir_data = explode("", $date_topic);
$dia_semana = $dividir_data[0];
switch ($dia_semana){
case 'Sun':
		$dia_semana = 1;
		$dia = "sunday";
		
break;
case 'Mon':
		$dia_semana = 2;
		$dia = "monday";
break;
case 'Tue':
		$dia_semana = 3;
		$dia = "tuesday";
break;
case 'Wed':
		$dia_semana = 4;
		$dia = "wednesday";
		

break;
case 'Thu':
		$dia_semana = 5;
		$dia = "thursday";
break;
case 'Fri':
		$dia_semana = 6;
		$dia = "friday";
				
break;
case 'Sat':
		$dia_semana = 7;
		$dia = "saturday";
				
break;
}
echo"<tr>";
echo"<td>";
echo"<strong><a class='forum' href='ver_mensagens.php?id_topic=".$valor_topic['id_topic']."'>".$valor_topic['subject_topic']."</a></strong></td>";
echo "<td>". $total_msg."</td>";
echo "<td>".$valor_topic['username'] ."</td>";
echo"<td>".$dia .date (", J-m-y, G:i", strtotime($valor_topic['date_topic']))."</td>";  // strtotime A função espera que seja informada uma string contendo um formato de data em inglês 

if($nivel == '1') { echo "<td><a class='apagar' href='apagar_topico.php?id_topic=".$valor_topic['id_topic']."'>Delete</td>";}
echo"<tr>";		
}
echo "</table>";
}

?>