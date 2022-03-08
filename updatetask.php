<?php

include "connection.php";

if (isset($_GET['id'])) {
    $query = "SELECT * FROM `taak` WHERE id='".$_GET["id"]."'";
    $result = $conn->query($query); 
    if ( $result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc())
            {
                $task[] = $row;
            }
        }
    }
}
if (isset($_POST['task'])) {
    $taak_id = $_GET['id'];
    $action = "INSERT INTO `interactie` (acties, taak_id)
    VALUES('Taak gewijzigd', $taak_id)";
    $result = $conn->query($action); 
    if ( $result === FALSE) {
        echo "error" . $action . "<br />" . $conn->error;
    } else {
        $task = $_POST['task'];
        $query = "UPDATE taak SET task = '$task' WHERE id = '$taak_id'";
        $result = $conn->query($query); 
        if ( $result === FALSE) {
            echo "error" . $query . "<br />" . $conn->error;
        } else {
            header("Location: index.php");
        }
    }
}

?>

<?php include "header.php"; ?>
<form action="" method="POST">
    <input type="text" name="task" value="<?php echo $task[0]['task']?>" id="task" required>
    <button type="submit" class="btn" name="submit"> wijzig </button>
</form>
<?php include "footer.php"; ?>