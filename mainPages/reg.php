<?php 
    require_once '../config/link.php';
    require_once '../Functions/Functions.php';
    session_start();

    if ((!empty($_POST) && isset($_POST))) {

        $login = htmlspecialchars($_POST['loginReg']);
        $password = htmlspecialchars($_POST['passwordReg']);
        $hash = password_hash($password, PASSWORD_DEFAULT);

        if($login == "" || $password == ""){
            echo 'invalidForm';
        }
        else{
            $res = Functions::query("SELECT `login_user`, `password_user` FROM `users` WHERE `login_user` = '$login'");
            if($res -> num_rows == 0){
                $result = Functions::query("INSERT INTO `users` (`login_user`, `password_user`, `id_role`) VALUES ('$login', '$hash', 1)");
                $_SESSION['role'] = 'user';
                $_SESSION['username'] = $login;
                header('Location: ../index.php');
            }
            else echo 'loginErrReg';
        }
    }
?>