header("Content-Type: text/html; charset=utf-8");
<?php
// header, որ UTF-8 լինի
header("Content-Type: text/html; charset=utf-8");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    if ($name && $email && $password) {
        $entry = "$name|$email|$password\n";
        file_put_contents("users.txt", $entry, FILE_APPEND);
        header("Location: login.php");
        exit;
    } else {
        $error = "Խնդրում ենք լրացնել բոլոր դաշտերը։";
    }
}
?>