let message = document.getElementById('message');
document.getElementById('buttonAuth').addEventListener('click', async(e) => {
    e.preventDefault(); 
    try{
        let loginVal = document.getElementById('login').value;
        let passwordVal = document.getElementById('password').value;
        if(loginVal != ''){
            let query = await fetch('../mainPages/auth.php', {
                method: 'POST',
                headers: {'Content-Type':'application/x-www-form-urlencoded'},
                body: new URLSearchParams({login: loginVal, password: passwordVal})
            });
            let response = await query.text();
            if(response){
                console.log(response);
                if(response == 'loginErr'){
                    message.innerHTML = '<h3>Пользователя с данным логином не существует</h3>';
                }
                else if(response == 'passwordErr'){
                    message.innerHTML = '<h3>Введен неверный пароль</h3>';
                }
                else if (response == 'invalidForm'){
                    message.innerHTML = '<h3>Некоторые поля формы не заполнены</h3>';
                }
                else{
                    message.innerHTML = '';
                    window.location.replace("../mainPages/user.php");
                    document.location.href="https://constructor.local/mainPages/user.php";
                }
            }
        }
        else{
            console.log(response);
        }
    }
    catch (error){
        console.log(error);
    }
});