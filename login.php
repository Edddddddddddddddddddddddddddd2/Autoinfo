<?php
session_start();
header("Content-Type: text/html; charset=utf-8");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $found = false;

    $users = file("users.txt", FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($name, $u_email, $u_pass) = explode("|", $user);
        if ($email === $u_email && password_verify($password, $u_pass)) {
            $_SESSION["user"] = $name;
            header("Location: index.php");
            exit;
        }
    }
    $error = "Սխալ մուտքի տվյալներ։";
}
?>
