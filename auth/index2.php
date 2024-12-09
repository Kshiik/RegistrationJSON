<?php
    if (isset($_POST['reg-button'])) {
        header("Location: ../");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="form">
        <p id="error"></p>
        <input type="text"  id="Login" placeholder="Логин">
        <input type="password" id="Password" placeholder="Пароль"> 
        <p onclick="sendPHP()">Войти</p>
    </div>
    <form action="" method="POST">
        <input name="reg-button" value="зарегистрироваться" type="submit">
    </form>
    <script>
        function sendPHP(){
            const xhr = new XMLHttpRequest();
            const data = new FormData();
            data.append("Login",document.getElementById("Login").value);
            data.append("Password",document.getElementById("Password").value);

            xhr.open("POST","send2.php",true);
            xhr.onload = function(){
                if(xhr.status >= 200 && xhr.status < 400){
                    console.log("Ответ получен");
                    let result = JSON.parse(xhr.responseText);
                    console.log(result);
                    switch(result.status){
                        case "Empty input":
                            document.getElementById("error").innerText= result.message;
                        break;
                        case "Error data":
                            document.getElementById("error").innerText= result.message;
                        break;
                        case "Success":
                            document.getElementById("error").innerText= result.message+" как:"+result.data.firstname;
                        break;
                    }
                }
                else{
                    console.log("Ошибка отправки:"+xhr.status);
                }
            }
            xhr.send(data);
            
        }
    </script>
</body>
</html>