<?php

include "connection.php";
    if (isset($_POST['task'])) {
        $task = $_POST['task'];
        $user_id =  $_SESSION['user_id'];
        $task = "INSERT INTO `taak` (task, user_id)
        VALUES('$task', '$user_id')"; 
        $result = $conn->query($task);
        
        $task_id = $conn->insert_id;
        $action = "INSERT INTO `interactie` (acties, taak_id)
        VALUES('Taak toegevoegd', '$task_id')";
        $result2 = $conn->query($action); 
    if ( $result === FALSE) {
        echo "error" . $task . "<br />" . $conn->error;
    }
    else if ( $result2 === FALSE) {
        echo "error" . $action . "<br />" . $conn->error;
    } else {
        header("Location: index.php");
    }
}

?>

<?php
    include "header.php";
?>

<div class="box">
    <h1>Wat zijn je taken voor vandaag?</h1>
</div>

<p><a href="index.php">Terug</a></p>

<form action="" method="POST">
    <input type="hidden" value="<?php echo $_SESSION['user_id'];?>" 
    name="user_id" id="user_id" required>
    Taak: <input type="text" name="task" id="task" required>
    <button type="submit" class="btn"  name="submit"> Voeg taak </button>
</form>

<?php
    include "footer.php";
?>