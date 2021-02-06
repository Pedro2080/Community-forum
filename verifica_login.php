<?php

//ligacao a base de dados e cabecalho
include("datebase.php");
include("cabecalho.php");
ob_start();
//verificar se os campos do formulario estao preenchidos
if  (!empty($_POST)   AND (empty($_POST['nome']) OR 
    empty($_POST['password']))){
    header("Location:login.php");
exit;
}
//definir variaveis

$nickname=$_GET['nome'];
$password=$_GET['password'];
            $sql="SELECT id_user, username, email, password, user_state, user_level FROM users WHERE username='$nickname' AND password='$password' ";
            $consulta = mysqli_query($ligacao,$sql);
            if(mysqli_num_rows($consulta) !=1){
//possibilidade 1: redireciona o utilizador se nao esta registado
                header("Location: login.php");
                exit;
            }else{
//possibilidade 2: redireciona o utilizador se nao esta ativo
                $resultado = mysqli_fetch_assoc($consulta);
//atribui dados encontrados na sessao
                session_start();
                $_SESSION['id_user'] = $resultado['id_user'];
                $_SESSION['username'] = $resultado['username'];
                $_SESSION['user_state'] = $resultado['user_state'];
                $_SESSION['user_level'] = $resultado['user_level'];
                if ($_SESSION['user_state'] == 'N'){
                    session_destroy();
                    echo "<script
                        alert('Your user is not active, please contact the admin joaopedro2080@hotmail.com');
                        window.location.href='index.php';
                    </script>";
                }
                //possibilidade 3: redireciona o utilizador se esta ativo e possui nivel 1 ou 2
                elseif (($resultado['user_level'] == 1) OR ($resultado['user_level'] ==2)){
                    header("Location: index.php");
                    exit;
                }
            }          
        mysqli_free_result($consulta); // Libera la memoria del resultado
?>