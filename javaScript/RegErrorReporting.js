let messageReg = document.getElementById('messageReg');
document.getElementById('buttonReg').addEventListener('click', async(e) => {
    e.preventDefault();
    try{
        let loginValReg = document.getElementById('loginReg').value;
        let passwordValReg = document.getElementById('passwordReg').value;
        if(loginValReg != ''){
            let regQuery = await fetch('../mainPages/reg.php', {
                method: 'POST',
                headers: {'Content-Type':'application/x-www-form-urlencoded'},
                body: new URLSearchParams({loginReg: loginValReg, passwordReg: passwordValReg})
            });
            let responseReg = await regQuery.text();
            if(responseReg){
                console.log(responseReg);
                if(responseReg == 'loginErrReg'){
                    messageReg.innerHTML = '<h3>Пользователь с данным логином уже существует</h3>';
                }
                else if (responseReg == 'invalidForm'){
                    messageReg.innerHTML = '<h3>Некоторые поля формы не заполнены</h3>';
                }
                else{
                    messageReg.innerHTML = '';
                    window.location.replace("../index.php");
                    document.location.href="https://constructor.local/index.php";
                }
            }
        }
        else{
            console.log(responseReg);
        }
    }
    catch (error){
        console.log(error);
    }
});