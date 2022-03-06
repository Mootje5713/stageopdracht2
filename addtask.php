<?php

include "connection.php";
    if (isset($_GET['task'])) {
        $task = $_GET['task'];
        $user_id =  $_GET['user_id'];
        $task = "INSERT INTO `taak` (task, user_id)
        VALUES('$task', '$user_id')"; 
    if ( $conn->query($task) === FALSE) {
        echo "error" . $task . "<br />" . $conn->error;
    } else {
        header("Location: index.php");
    }
}

?>

<?php
    include "header.php";
?>

<form action="" method="GET">
    <input type="hidden" value="<?php echo $_SESSION['user_id'];?>" 
    name="user_id" id="user_id" required>
    Taak: <input type="text" name="task" id="task" required>
    <br>
    <input type="submit" name="submit" value="Verstuur">
</form>

<?php
    include "footer.php";
?>