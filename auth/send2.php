<?php

$dbh = new PDO('mysql:host=localhost;dbname=regis', 'root', '');
if(isset($_POST['Login'])){
   if(!empty($_POST['Login'] && !empty($_POST['Password']))){
    $stmt = $dbh->prepare("SELECT * FROM users WHERE login = :login AND password = :password");
    $stmt->execute([
        "login" => $_POST['Login'],
        "password" => $_POST['Password']
    ]);
    $result = $stmt->fetch();
    if(!empty($result['firstname'])){
        echo json_encode([
            "status"=> "Success",
            "message" => "Вы вошли",
            "data" => $result
        ]);
    }
    else{
        echo json_encode([
            "status"=> "Error data",
            "message" => "Не верный логин или пароль"
        ]);
    }
   }
   else{
    echo json_encode([
        "status"=> "Empty input",
        "message" => "Заполните все поля"
    ]);
   }
    
}


?>