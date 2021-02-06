
<?php
include("datebase.php");
include("cabecalho.php");


$sql_utilizador ="SELECT * FROM users WHERE user_state = 'N' ORDER BY username ASC";
$consulta = mysqli_query($ligacao,$sql_utilizador);
$resultado=mysqli_num_rows($consulta);
echo $resultado;
?>

<table width='800 px' border='1' align='center' class='tabela_baixo' cellspacing='0'>
    <tr>

    <td class="utilizadores" colspan="12"> <p class="letra_titulo">User list to validate</p>
    </tr>

    <tr>
        <form name="form_alterar" method="POST">
            <tr>
                <td class="utilizadores" width="100">Id user</td>
                <td class="utilizadores" width="200">Username</td>
                <td class="utilizadores" width="300">Email</td>
                <td class="utilizadores" width="100">Level</td>
                <td class="utilizadores" width="100">New level?</td>
                <td class="utilizadores" width="300">Select to activate/deactivate</td>
            </tr>

            <?php
            $query="Select * from users";
            $resultado=mysqli_query($ligacao,$query);
            while($user=mysqli_fetch_array($resultado)){ ?>
            <tr align="center">
                <td><?php echo $user['id_user'];?></td>
                <td><?php echo $user['username'];?></td>
                <td><?php echo $user['email'];?></td>
                <td><?php echo $user['user_level'];?></td>
                    <td><select name="new_level">
                           <!-- <option value="0">0</option> -->
                            <option value="1">1</option>
                            <option value="2">2</option>


                </select>
                    </td>
<td><input name="caixa_verifica[]" type="checkbox" value="<?php echo $user['id_user'];?>"/></td>
                <?php
                }
                ?>
                <tr>
                <td colspan="12" align="center">
                    <input name="ativar" type="submit" value="Activate"/>
                    <input name="deactivate" type="submit" value="Deactivate"/>
                </td>

            </tr>

        </form>

    </tr>

</table>


<?php
if(isset($_POST['caixa_verifica'])){
    $caixa_verifica = $_POST['caixa_verifica'];
    if(isset($_POST['ativar'])?$ativar=$_POST['ativar']:$desativar=$_POST['desativar']);
        $id_user = "('".implode("''", $caixa_verifica)."');";
    $sql1="UPDATE users SET user_state ='".(isset($ativar)?'Y':'N')."' WHERE id_user IN $id_user" ;
    $sql2="UPDATE users SET user_level ='".$_POST['new_level']."' WHERE id IN $id_user";

    $resultado1 = mysqli_query($ligacao,$sql1);
    $resultado2 = mysqli_query($ligacao,$sql2);


}
$sql_utilizador ="SELECT * FROM users WHERE user_state = 'N' ORDER BY username ASC";
$consulta = mysqli_query($ligacao,$sql_utilizador);
$resultado=mysqli_num_rows($consulta);
echo $resultado;
?>