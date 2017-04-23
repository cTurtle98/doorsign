<?php

$resArray = array();
$servername = "localhost";
$username = "doorsign";
$password = "doorsign";
$dbname = "door_sign";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
$sql = "SELECT type, title, status FROM messages WHERE `active` = 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        array_push($resArray, $row);
                    }
                    print_r(json_encode($resArray));
                   }

?>