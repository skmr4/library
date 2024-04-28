<?php
include("connection.php");
require("register.php");
//if(isset($_POST['submit'])){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $email = $password = $gender = "";
        $errN = $errP = $errE = $errG = "";
        if(isset($_POST['username'])){
            $username = stripcslashes(strtolower($_POST['username']));
            $username = htmlentities(($_POST["username"]));
        }else{
            $errN = "Please Enter The Name";
        }
    
        if(isset($_POST['email'])){
            $email = stripcslashes($_POST['email']);
            $email = htmlentities(($_POST["email"]));
        }else{
            $errE = "Please Enter The Email";
        }
        
        if(isset($_POST['password'])){
            $password = stripcslashes($_POST['password']);
            $password = htmlentities(($_POST["password"]));
        }

        if(isset($_POST['gender'])){
            $gender = ($_POST["gender"]);
        }else{
            $errG = "Please Choose True Value";
        }

    $user = "SELECT username, password FROM visitor";
    $result = $con->prepare($user);
    $count = $result->fetchAll(PDO::FETCH_ASSOC);
    if(!empty($count)){
        echo 'user name already exist<br>';
    }else{
        $sql = "INSERT INTO visitor(username, email, password, gender) VALUES (:username, :email, :password, :gender)";
        $stmt = $con->prepare($sql);
        $stmt->execute([
            ':username'=> $username,
            ':email'=> $email,
            ':password'=> $password,
            ':gender'=> $gender
        ]);
        echo '<script>
        setTimeout(function() {
            window.location.href = "login.php";
        }, 2000);
        </script>'; 
        }
}

?>