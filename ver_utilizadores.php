
<?php

//ligacao a base de dados e cabecalho
include("datebase.php");
include("cabecalho.php");
if(isset($_POST['caixa_verifica'])){
    $caixa_verifica = $_POST['caixa_verifica'];
    if(isset($_POST['ativar'])?$ativar = $_POST['ativar']:$desativar = $_POST['desativar'])
        $id_user = "('".implode("','",$caixa_verifica) ."');";

    $sql1="UPDATE users SET user_state = '".(isset($ativar)?'Y':'N')."' WHERE id_user IN $id_user";

    $sql2="UPDATE users SET user_level = '".$_POST['new_level']."' WHERE id_user IN $id_user";

    $result1 = mysqli_query($ligacao,$sql1);

    $result2 = mysqli_query($sql2);
}

$sql_user="SELECT * FROM users WHERE user_state = 'Y' ORDER BY username ASC";

$consulta=mysqli_query($ligacao,$sql_user);
$resultado=mysqli_num_rows($consulta);

?>






<table width='800 px' border='1' align='center' class='tabela_baixo' cellspacing="0">

    <tr>
        <td class="utilizadores" colspan="12"><p class="letra_titulo">User lists, to confirm</p>
    </tr>

    <tr>
        <form name="form_alterar" method="POST">
            <tr class="usar" colspan="12">

                <td class="utilizadores" width="400">Id user</td>
                <td class="utilizadores" width="400">Username</td>
                <td class="utilizadores" width="200">Email</td>
                <td class="utilizadores" width="200">Level</td>
                <td class="utilizadores" width="200">New level?</td>
                <td class="utilizadores" width="200">Select to enable/disable</td>
                <td class="utilizadores" width="100">Status</td>
            </tr>

            <?php
            $query="Select * from users";
            $resultado=mysqli_query($ligacao,$query);
            while($user = mysqli_fetch_array($consulta)) { ?>
            <tr align="center">
                <td><?php echo $user['id_user']; ?></td>

                <td><?php echo $user['username']; ?></td>

                <td><?php echo $user['email']; ?></td>

                <td><?php echo $user['user_level']; ?></td>

                <td><select name="new_level">
                        <!--<option value="0">0</option> -->
                        <option value="1">1</option>
                        <option value="2">2</option>


                    </select>

                </td>




                <td><input name="caixa_verifica" type="checkbox" value="<?php echo $user['id_user']; ?>"/></td>
                <?php
                }
                ?>


                <td >
                    <?php
                    if($user['user_state']=="N") {
                        echo '<img src="icones/admin.jpg"/>';
                    }
                    else{
                        echo '<img src="icones/user.jpg"/>';
                    }

                    ?>


                </td>


            <tr>
                <td colspan="12" align="center">
                    <input name="ativar" type="submit" value="Activate"/>
                    <input name="desativar" type="submit" value="Deactivate"/>
                </td>
            </tr>
            </form>
</table>



