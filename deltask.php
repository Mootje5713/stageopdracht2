<?php 

include "connection.php";

if (isset($_GET['task'])) {
    $task_id = $_GET['taak_id'];
    $action = "INSERT INTO `interactie` (acties, taak_id)
    VALUES('Taak verwijderd', '$task_id')";
    $result = $conn->query($action); 
    if ( $result === FALSE) {
        echo "error" . $action . "<br />" . $conn->error;
    } else {
        header("Location: index.php");
    }
}


if (isset($_GET['id'])) {
    $id = $_GET['id']; 
    $user_id = $_SESSION['user_id'];
    $query = "DELETE FROM taak WHERE user_id=$user_id AND id=$id";
    $result=$conn->query($query);
    if ($result === TRUE) {
        header("Location: index.php");
    }
}

?>