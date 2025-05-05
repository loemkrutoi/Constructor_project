
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
</head>
<body>
<?php 

    require_once 'header.php';
    require_once '../Functions/Functions.php';
    session_start();

    $username = $_SESSION['username'];
    $admin = false;

    if($_SESSION['role'] == 'admin'){
        $admin = true;
    }
    else $admin = false;

    $result = Functions::query("SELECT `id_user`, `login_user`, `registration_date`, `user_role`
    FROM `users`
    JOIN `roles` ON `roles`.`id_role` = `users`.`id_role`
    WHERE `login_user` = '$username'");
    
    foreach($result as $row){
        echo "<div class='container'>
        <h1>Добро пожаловать в личный кабинет, " . $row['login_user'] . "</h1>
        <p>Ваш номер регистрации: " . $row['id_user'] . "</p>
        <p>Ваша дата регистрации: " . $row['registration_date'] . "</p>
        <p>Ваша роль: " . $row['user_role'] . "</p>";
    }
?>
<a style='<?php echo $admin == true ? "display: inline;" : "display: none;"?>' href="admin.php">Панель администратора</a><br>
<a href='logout.php'>Выйти из личного кабинета</a></div>
</body>
</html>