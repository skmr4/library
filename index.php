<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="main">
        <h1>Welcome to Local Library Login</h1>
        <?php if(isset($error)) { echo $error; } ?>
        <form method="post" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>>

            <input type="text" name="username" id="username" placeholder="username" required><br>
            <input type="password" name="password" id="password" placeholder="password" required><br>
            <input type="submit" name="Log in" id="Log in" value="Log in"><br>
            <h2>Or</h2><br>
            <a href="register.php" id="reg">Register<br>

    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        require("connection.php");
        $name = htmlspecialchars($_POST["username"]);
        $pass = htmlspecialchars($_POST["password"]);
        $sql = 'SELECT username, password FROM visitor WHERE username = :n AND password = :p'; 
        $stmt = $con->prepare($sql);
        $stmt->execute(array(
            ':n' => $name,
            ':p' => $pass
        ));
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);                
        if($users > 0){
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            //header('location: library');
            echo 'successfully!';
        }else{
            $error = "Invalid username or password";
        }
    }
    ?>
</div>
</body>
</html>