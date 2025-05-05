<?php 
    require_once '../config/link.php';
    require_once '../Functions/Functions.php';
    session_start();

    if ((!empty($_POST) && isset($_POST))) {

        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);

        if($login == "" || $password == ""){
            echo 'invalidForm';
        }
        else if($login != "" && $password != "") {
            if ($login == "loem" && $password == "loh") {
                $_SESSION['role'] = 'admin';
                $_SESSION['username'] = 'loem';
                header("Location: admin.php");
            }
            else{
                $res = Functions::query("SELECT `login_user`, `password_user` FROM `users` WHERE `login_user` = '$login'");
                if ($res->num_rows == 0){
                    echo 'loginErr';
                }
                else{
                    foreach($res as $row){
                        if(password_verify($password, $row['password_user'])){
                            $_SESSION['role'] = 'user';
                            $_SESSION['username'] = $login;
                            header('Location: user.php');
                        }
                        else echo 'passwordErr';
                    }
                }
            }
        }
    }
?>