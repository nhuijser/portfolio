<!DOCTYPE html>
<html lang="en">
<head>
    <link href="login.css" rel="stylesheet" type="text/css">
    <title>Login - Nathan Portfolio</title>
    <script src="login.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<body>
    <div class="text-box">
        <h1 id=hey-text>Hey!</h1>
        <p>You're probably not supposed to be here...</p>
        <p>Please 
            <a href="../../index.php" id="click-here-text">
                click here
            </a> 
            to return to my portfolio :D</p>
    </div>
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
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if($_SESSION["loggedin"] === true){
    header("location: ../admin/admin.php");
    exit;
}

$dbh = new PDO('mysql:host=localhost;dbname=fullstack', 'root', 'root');

// check if connection was succesful

// if ($dbh) {
//     echo "Database Connection succesful<br><br>";
// } else {
//     echo "Database Connection failed<br><br>";
// }

if($_SERVER["REQUEST_METHOD"] == "POST") {

if(!$_POST["username"] && !$_POST["password"]) {
echo "Please enter a username and password";
} else {    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";

    $result = $dbh->query($sql);

    if ($result->rowCount() > 0) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        
        header("location: ../admin/admin.php");
        print_r("Login succesful");
    } else {
        echo "<script>alert('Incorrect username or password')</script>";
    }
}   
}
?>