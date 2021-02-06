<?php

require('datebase.php');
$sql = "DELETE FROM forum WHERE id_forum = ".$_GET['id_forum'];
$consulta = mysqli_query($sql);
header("Location:index.php");
exit;

?>