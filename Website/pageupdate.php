<?php

$db_host = "localhost";
$db_username = "doorsign";
$db_password = "doorsign";
$database = "door_sign";
$dbcon = new PDO("mysql:host=$db_host;dbname=$database", $db_username, $db_password);

if (!$dbcon) {
    die("Connection failed");
}

$stmt = $dbcon->prepare("SELECT `id`, `type`, `title`, `status` FROM `messages` WHERE `active` = '1' LIMIT 1");
$success = $stmt->execute();

if (!$success) {
    die("Error fetching message"); //TODO: Print error
}

if ($stmt->rowCount() == 0) {
    die();
}

$row = $stmt->fetch(PDO::FETCH_ASSOC);

print(json_encode($row));
?>
