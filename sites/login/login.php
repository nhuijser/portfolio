<?php
session_start();

if ($_SESSION["loggedin"] === true) {
    header("location: ../admin/admin.php");
    exit;
}

$json = file_get_contents('../../database.json');
$data = json_decode($json, true);

$usernameConfig = $data['user'];
$passwordConfig = $data['password'];

$dbh = new PDO('mysql:host=localhost;dbname=portfolio', $usernameConfig, $passwordConfig);

if (!isset($_POST["username"]) || !isset($_POST["password"])) {
    echo "Please enter a username and password";
} else {
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

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
