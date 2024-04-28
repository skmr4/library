<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
    <h1>Welcome to Local Library Register page</h1>
    <form action="re-post.php" method="POST">

    <input type="text" name="username" id="username" placeholder="username"><br>
    <?php if(isset($errN)) { echo $errN . "\n"; } ?>

    <input type="password" name="password" id="password" placeholder="password"><br>
    <?php if(isset($errP)) { echo $errP . "\n"; } ?>

    <input type="email" name="email" id="email" placeholder="email"><br>
    <?php if(isset($errE)) { echo $errE . "\n"; } ?>

    Gender <select name="gender">
        <option disabled selected>Choose</option>
        <option value="f">Female</option>
        <option value="m">Male</option>
    </select>
    <?php if(isset($errG)) { echo $errG . "\n"; } ?>
    <br>
    <input type="submit" name="register" id="register" value="register"><br>
</form>
</div>
</body>
</html>