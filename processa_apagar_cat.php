


<?php

require('datebase.php');
$sql = "DELETE FROM category WHERE id_category = ".
$_GET['id_category'];
$consulta = mysqli_query($ligacao,$sql);
header("Location: menu_admin.php");
exit;
?>
