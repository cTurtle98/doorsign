<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

//MySQL Server Information
$db_host = "localhost";
$db_username = "doorsign";
$db_password = "doorsign";
$database = "door_sign";
$RowCard = $_REQUEST["card-num"];
$Table = "cards";
$dbcon = new PDO("mysql:host=$db_host;dbname=$database", $db_username, $db_password);

if (!$dbcon) {
    die("Connection failed"); //TODO: Print error
}

echo "Connected<br>\n";

$stmt = $dbcon->prepare("SELECT `message1`, `message2` FROM `{$Table}` WHERE `Card#` = ? LIMIT 1");
$stmt->bindValue(1, $RowCard);
$success = $stmt->execute();

if (!$success) {
    die("Error fetching card info"); //TODO: Print error
}

if ($stmt->rowCount() == 0) {
    die("No such card");
}

echo "Card Information Recieved.<br>\n";

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$Message1 = $row["message1"];
$Message2 = $row["message2"];

$Message1_Active = null;
$Message1_Message = null;
$Message1_Title = null;
$Message1_Type = null;

$Message2_Active = null;
$Message2_Message = null;
$Message2_Title = null;
$Message2_Type = null;

//Here's Where it Gets Interesting
$stmt = $dbcon->prepare("SELECT `active`, `title`, `type`, `status` FROM `messages` WHERE `id` = ? LIMIT 1");
$stmt->bindValue(1, $Message1);
$success = $stmt->execute();

if ($success) {
    if ($stmt->rowCount() > 0) {
        echo "Data from Messages 1 Recieved.<br>\n";

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $Message1_Active = (bool) $row["active"];
        $Message1_Message = $row["status"];
        $Message1_Title = $row["title"];
        $Message1_Type = $row["type"];
    }else{
        echo "Card has no message<br>\n";
    }
}else{
    echo "Error fetching message 1 info<br>\n"; //TODO: Print error
}

$stmt = $dbcon->prepare("SELECT `active`, `title`, `type`, `status` FROM `messages` WHERE `id` = ? LIMIT 1");
$stmt->bindValue(1, $Message2);
$success = $stmt->execute();

if ($success) {
    if ($stmt->rowCount() > 0) {
        Echo "Data from Messages 2 Recieved.<br>\n";

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $Message2_Active = (bool) $row["active"];
        $Message2_Message = $row["status"];
        $Message2_Title = $row["title"];
        $Message2_Type = $row["type"];
    }else{
        echo "Card has no message<br>\n";
    }
}else{
    echo "Error fetching message 1 info<br>\n"; //TODO: Print error
}

//MySQL Information is in. Update Time.
if ($Message1_Active || $Message2_Active) {
    $stmt = $dbcon->prepare("UPDATE `messages` SET `active` = '0' WHERE `id` = ?");
    $stmt->bindValue(1, $Message1_Active ? $Message1 : $Message2);
    $success = $stmt->execute();

    if ($success) {
        echo "Message " . ($Message1_Active ? "1" : "2") . " deactivated<br>\n";

        $stmt = $dbcon->prepare("UPDATE `messages` SET `active` = '1' WHERE `id` = ?");
        $stmt->bindValue(1, $Message1_Active ? $Message2 : $Message1);
        $success = $stmt->execute();

        if ($success) {
            echo "Message " . ($Message1_Active ? "2" : "1") . " activated<br>\n";
        }else{
            echo "Error updating message record<br>\n"; //TODO: Print error
        }
    }else{
        echo "Error updating message record<br>\n"; //TODO: Print error
    }
}else{
    //Oh Boy, Here's the Fun Part.
    $stmt = $dbcon->prepare("UPDATE `messages` SET `active` = '0' WHERE `active` != '0'");
    $success = $stmt->execute();

    if ($success) {
        echo "All messages deactivated<br>\n";

        $stmt = $dbcon->prepare("UPDATE `messages` SET `active` = '1' WHERE `id` = ?");
        $stmt->bindValue(1, $Message1);
        $success = $stmt->execute();

        if ($success) {
            echo "Message 1 activated<br>\n";
        }else{
            echo "Error updating message record<br>\n"; //TODO: Print error
        }
    }else{
        echo "Error updating message record<br>\n"; //TODO: Print error
    }
}

//End of Interesting Code.
?>
