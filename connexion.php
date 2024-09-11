<?php
$pass = "mysql";
$user = "root";
$conn = new PDO('mysql:host=localhost;dbname=gacti', $user, $pass);
if (!$conn) {
    echo("connexion échoué");
}
?>
