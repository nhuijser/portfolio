    <!DOCTYPE html>
    <html lang="en">
    <head>
        <link href="login.css" rel="stylesheet" type="text/css">
        <title>Login - Nathan Portfolio</title>
        <script src="login.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body>
    
        <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <button class="btn" type="submit">Login</button>
        </form>
    </body>
    </html>


    <?php

    session_start();
    
    if($_SESSION["loggedin"] === true){
        header("location: ../admin/admin.php");
        exit;
    }

        $json = file_get_contents('../../database.json');

    $data = json_decode($json, true);

    $username = $data['user'];
    $password = $data['password'];

    $dbh = new PDO('mysql:host=localhost;dbname=fullstack', $username, $password);

    if(!$_POST["username"] || !$_POST["password"]) {
        echo "Please enter a username and password";
    } else {    
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        $stmt = $dbh->prepare("SELECT * FROM login WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            
            header("location: ../admin/admin.php");
            print_r("Login successful");
        } else {
            echo "<script>alert('Incorrect username or password')</script>";
        }

    }
    ?>