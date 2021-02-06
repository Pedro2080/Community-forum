<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//PL" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="estilo_forum.css" rel="stylesheet" type="text/css" media="screen" />
    <title>New forum</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="estilo_forum.css" rel="stylesheet" />

</head>


<body>

    <?php
    include("cabecalho.php");
    include("datebase.php");


    if(isset($_REQUEST['criar'])){
        $sql_forum ="INSERT INTO forum (id_category, forum_name, forum_summary) VALUES ('".$_POST['id_category']."', '".$_POST['forum_name']."','".$_POST['forum_summary']."');";
        mysqli_query($ligacao,$sql_forum);
        header("Location:menu_admin.php");
    }
    else{
        //inicia construacao da tabela pra mostrar formulario e categorias disponiveis
        echo '<table width="800 px" border="1" align="center" class="tabela_baixo" cellpadding="0">';
        echo '<form id="form_registo" name="form_registo" method="post" action="novo_forum.php">';

        //selecionar categorias disponiveis . onde podem ser criados foruns
     $sql = "SELECT id_category, category_name, id_user FROM category ORDER BY category_name;";
        $consulta = mysqli_query($ligacao,$sql);

        echo '<tr>';
        echo '<td>Category:</td>';
        echo '<td>';
        echo '<select name="id_category">';

        while($resultado=mysqli_fetch_assoc($consulta)){
            echo "<option value=" . $resultado['id_category'].">" . $resultado['category_name']. "</option>";
        }
    }

    ?>
    </select>
    </td></tr>
<tr>
    <tr>
        <td>Forum name:</td>
        <td><input type="text" name="forum_name" ></textarea></td>
    </tr>

    <tr>
        <td>Forum Summary:</td>
        <td><textarea name="forum_summary" rows="10" cols="50"></textarea></td>
    </tr>

    <tr>
        <td></td>
    <td><input type="submit" name="criar" VALUE="Put">
        <input type="reset" name="apagar" value="Clean">
    </td>


</tr>
    </form>
</table>

</body>

</html>