<?php
//MySQL Server Information
$ServerAddress = "localhost";
$Username = "doorsign";
$Password = "doorsign";
$DBName = "door_sign";
$RowCard = $_GET["card-num"];
$Table = "cards";
$conn = new mysqli($ServerAddress, $Username, $Password, $DBName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT message1, message2 FROM {$Table} WHERE Card#={$RowCard}";
if ($conn->query($sql) === TRUE) {
    Echo "Connection to the Database Success, Card Information Recieved.";
    $Message1 = $_row["message1"];
    $Message2 = $_row["message2"];
 //Here's Where it Gets Interesting
    $sql = "SELECT active, title, type, status FROM messages WHERE id={$Message1}";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            Echo "Data from Messages Recieved.";
            $Message1_Active = $row["active"];
            $Message1_Message = $row["status"];
            $Message1_Title = $row["title"];
            $Message1_Type = $row["type"];
        }
    } else {
        echo "Card Error";
    }
    $sql = "SELECT active, title, type, status FROM messages WHERE id={$Message2}";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            Echo "Data from Messages 2 Recieved.";
            $Message2_Active = $row["active"];
            $Message2_Message = $row["status"];
            $Message2_Title = $row["title"];
            $Message2_Type = $row["type"];
        }
    } else {
        echo "Card Error";
    }
//MySQL Information is in. Update Time.
if ($Message1_Active === 1){
            $sql = "UPDATE messages SET active='0' WHERE id={$Message1}";
        if ($conn->query($sql) === TRUE) {
                    $sql = "UPDATE messages SET active='1' WHERE id={$Message2}";
                if ($conn->query($sql) === TRUE) {
                echo "Success!";
            }
        } else {
            echo "Error updating record: " . $conn->error;
        }
 }
if ($Message1_Active === 2){
            $sql = "UPDATE messages SET active='0' WHERE id={$Message2}";
        if ($conn->query($sql) === TRUE) {
                    $sql = "UPDATE messages SET active='1' WHERE id={$Message1}";
                if ($conn->query($sql) === TRUE) {
            echo "Success!";
            }
        } else {
            echo "Error updating record: " . $conn->error;
        }
}
//Oh Boy, Here's the Fun Part.
if ($Message1_Active === 0){
            $sql = "UPDATE messages SET active='0' WHERE active != 0";
        if ($conn->query($sql) === TRUE) {
                    $sql = "UPDATE messages SET active='1' WHERE id={$Message1}";
                if ($conn->query($sql) === TRUE) {
            echo "Success!";
        } else {
            echo "Error updating record: " . $conn->error;
        }
}
 
//End of Interesting Code.
    } else {
        echo "Error Fetching Entries. (None Found!) " . $conn->error;
    }
}
?>