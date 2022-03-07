<?php

include "connection.php";

if (isset($_GET['id'])) {
    $taak_id = $_GET['id'];
    $action = "INSERT INTO `interactie` (acties, taak_id)
    VALUES('Taak geopend', $taak_id)";
    $result = $conn->query($action); 
    if ( $result === FALSE) {
        echo "error" . $action . "<br />" . $conn->error;
    } else {
        $query = "UPDATE taak SET closed = NULL WHERE id = $taak_id";
        $result = $conn->query($query); 
        if ( $result === FALSE) {
            echo "error" . $query . "<br />" . $conn->error;
        } else {
            header("Location: index.php");
        }
    }
}

?>