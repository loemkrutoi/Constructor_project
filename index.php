<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
</head>
<body>
<div class="space container-fluid vh-100">
    <?php 

    require_once 'mainPages/header.php';
    session_start();

    $loggedIn = false;

    if(!empty($_SESSION['username']) && !empty($_SESSION['role'])){
        $loggedIn = true;
    }
    else{
        $loggedIn = false;
    }
    ?>
    <div class="container">
        <h1 class="text-center text-light">Добро пожаловать на главную страницу!<br><h2 style="<?php echo !empty($_SESSION['username']) ? "display:block; text-align:center" : "display:none;" ?>">Пользователь <?= $_SESSION['username'] ?></h2></h1>
        <div class="toModalAuth" style="<?php echo $loggedIn == false ? "display: block; text-align: right;" : "display: none;" ?>"><a href="">Авторизоваться</a></div>
        <div style="<?php echo $loggedIn == true ? "display: block; text-align: right;" : "display: none;" ?>"><a href="mainPages/user.php">В личный кабинет</a></div>
    </div>

    <div class="modal-bg">
        <div class="modal-body modal-inactive modal-window-auth">
            <div class="modal-1">
                <div class="modal-top">
                    <button class="modal-close-btn">x</button>
                </div>
                <div class="modal-middle">
                <h1 class="text-center w-100">Авторизация</h1>
                    <div class="message" id="message">
                        <h3></h3>
                    </div>
                    <form action="" method="POST" class="authForm m-auto text-center" enctype="application/x-www-form-urlencoded">
                        <label for="login">Логин</label>
                        <input type="text" id="login" name="login" value="<?php if (isset($_POST['login'])) echo $_POST['login'] ?>" required><br><br>
                        <label for="login">Пароль</label>
                        <div class="position-relative">
                            <input class="password" type="password" id="password" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password'] ?>" required>
                            <a href="#" class="passwordCtrl position-absolute" onclick="return showHiddenPass(this);"></a><br><br>
                        </div>
                        <input class="mb-5" type="submit" id="buttonAuth">
                        <a class="text-center toModalReg" href="">У меня еще нет аккаунта</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-body modal-inactive modal-window-reg">
        <div class="modal-2">
                <div class="modal-top">
                    <button class="modal-close-btn">x</button>
                </div>
                <div class="modal-middle">
                <h1 class="text-center w-100">Регистрация</h1>
                <div class="message" id="messageReg">
                    <h3></h3>
                </div>
                <form action="" method="POST" class="authForm m-auto text-center" enctype="application/x-www-form-urlencoded">
                    <label for="loginReg">Придумайте логин</label>
                    <input type="text" id="loginReg" name="loginReg" value="<?php if (isset($_POST['loginReg'])) echo $_POST['loginReg'] ?>" required><br><br>
                    <label for="passwordReg">Придумайте пароль</label>
                    <div class="position-relative">
                        <input class="password" type="password" id="passwordReg" name="passwordReg" value="<?php if (isset($_POST['passwordReg'])) echo $_POST['passwordReg'] ?>" required>
                        <a href="#" class="passwordCtrl position-absolute" onclick="return showHiddenPass(this);"></a><br><br>
                    </div>
                    <input class="mb-5" type="submit" id="buttonReg">
                    <a class="text-center toModalAuth" href="">У меня уже есть аккаунт</a>
                </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        let modalBg = document.querySelector('.modal-bg');
        let closeModalBtn = document.querySelectorAll('.modal-close-btn');

        let toModalAuth = document.querySelectorAll('.toModalAuth');
        let toModalReg = document.querySelector('.toModalReg');

        let modalWindow = document.querySelector('.modal-window-auth');
        let modalWindowReg = document.querySelector('.modal-window-reg');

        closeModalBtn.forEach(btn => {
            btn.addEventListener('click', () => {
            modalWindow.classList.remove('modal-active');
            modalWindow.classList.add('modal-inactive');
            modalWindowReg.classList.remove('modal-active');
            modalWindowReg.classList.add('modal-inactive');
            modalBg.classList.remove('modal-bg-visible');
        });
        });
        toModalAuth.forEach(toAuth => {
            toAuth.addEventListener('click', () => {
            event.preventDefault();
            modalWindow.classList.add('modal-active');
            modalWindow.classList.remove('modal-inactive');
            modalWindowReg.classList.remove('modal-active');
            modalWindowReg.classList.add('modal-inactive');
            modalBg.classList.add('modal-bg-visible');
        });
        });
        toModalReg.addEventListener('click', () => {
            event.preventDefault();
            modalWindowReg.classList.add('modal-active');
            modalWindowReg.classList.remove('modal-inactive');
            modalWindow.classList.remove('modal-active');
            modalWindow.classList.add('modal-inactive');
            modalBg.classList.add('modal-bg-visible');
        });
    </script>
    <script src="javaScript/ErrorReporting.js"></script>
    <script src="javaScript/RegErrorReporting.js"></script>
    <script src="Functions/Functions.js"></script>
</div>
</body>
</html>