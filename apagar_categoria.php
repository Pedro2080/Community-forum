
<?php
//ligacao a base de dados e cabecalho
include("datebase.php");
include("cabecalho.php");
$sql = 'SELECT * FROM category ORDER BY id_category ASC';
$consulta = mysqli_query($ligacao,$sql);

if($consulta !=0){
echo('<table class="tabela_baixo" width="800px" align="center" border=0>');
echo('<tr class="titulos"><td colspan="2" align="center"><h2>Select the registration number, in order to eliminate</h2></td></tr><br/>');
echo('<tr><td width="100 px" class="apagar_categorias"><h3>Registration number:</h3></td>
<td width="200px" class="apagar_categorias" height="15"><h3>Category name</h3></td>');


//para mostarar todas as categorias recorre-se ao controlo while()
while($mostrar = mysqli_fetch_array($consulta)){
$id_category = $mostrar["id_category"];
$category_name = $mostrar["category_name"];

echo("<tr><td align=\"center\"> <a onlick=\"return confirm('confirms, will you want to eliminate category?') \"
href=\"processa_apagar_cat.php?id_category=$id_category\">$id_category</a></td>
<td align=\"center\">$category_name</td>

</tr>");
}
echo"</table>";}

//se nao ha categorias, informa o utilizador
else {
    echo("Empty registers on datebase");
}

?>

 
 