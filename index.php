<?php

//ligacao a base de dados e cabecalho
include("datebase.php");
include("cabecalho.php");
//verificar nivel de utilizador e atribuir variavel
$nivel = 0;
if(isset($_SESSION['user_level'])) { $nivel = $_SESSION['user_level'];}


$sql_category ="SELECT * FROM category;";
$consulta1 = mysqli_query($sql_category);
    while($resultado = mysqli_fetch_assoc($consulta1)) {
        echo "<table  width='800 px' border='1' align='center' class='tabela_baixo' cellspacing=0>";
        echo "<tr class='titulos'><td colspan=3>";
        echo $resultado['category_name'] . "</td>";


        $sql_forum = "SELECT * FROM forum WHERE id_forum = ".
            $resultado['id_forum'].";";


        $consulta2 = mysqli_query($sql_forum);
        $total_foruns = mysqli_num_rows($consulta2);

        if($total_foruns !=0){
            while($resultado = mysqli_fetch_assoc($sonsulta1)){
                echo"<tr>";
//verificar se o utilizador é administrador e incluir hiperligacao para eliminar o forum

                if ($nivel == 1) {
                    echo "<td><a class='apagar' href='apagar_forum.php?id_forum=".$resultado['id_forum'] . "'>Delete </td>";}

//construir a tabela com hiperligacoes
                echo"<td width='30 px'></td>";
                echo"<td width='770 px' <strong><a class='forum' href='forum.php?id_forum=".$resultado['id_forum']."'>".$resultado['forum_name'] ."</strong></a>";
                echo"<br/><i>".$resultado['forum_summary']."</i>";
                echo"</td></tr>";
            }
        }

        else{
            echo"<tr><td>None Forum to display.</td></tr>";}
        echo"</table>";
    }


?>