<?php

$dbh = new PDO('mysql:host=localhost;dbname=regis', 'root', '');
if(isset($_POST['Firstname'])){
   if(!empty($_POST['Firstname'] && $_POST['Lastname'] && $_POST['Email'] && $_POST['Login'] && !empty($_POST['Password']))){
    $stmt = $dbh->prepare("INSERT INTO users (firstname, lastname, email, login, password) VALUES (:firstname, :lastname, :email, :login, :password)");
    $stmt->execute([
        "firstname" => $_POST['Firstname'],
        "lastname" => $_POST['Lastname'],
        "email" => $_POST['Email'],
        "login" => $_POST['Login'],
        "password" => $_POST['Password']
    ]);
    // $result = $stmt->fetch();
    // if(!empty($result['firstname'])){
        echo json_encode([
            "status"=> "Success",
            "message" => "Вы зарегистрированны",
            // "data" => $result
        ]);
    // }
   }
   else{
    echo json_encode([
        "status"=> "Empty input",
        "message" => "Заполните все поля"
    ]);
   }
    
}


?>