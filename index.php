<?php
    include "connection.php";
    if (isset($_GET['taak'])) {
        $taak = $_GET['taak'];
        $taak = "INSERT INTO `taak`(taak)
        VALUES('$taak')"; 

    if ( $conn->query($taak) === FALSE) {
        echo "error" . $taak . "<br />" . $conn->error;
    }
}
    $query = "SELECT * FROM `taak` WHERE user_id='".$_SESSION["user_id"]."'";
    $result=$conn->query($query);
    if ( $conn->query($query) === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc())
            {
                $taak[] = $row;
            }
        }
    }

    $conn->close();
?>

<?php
    include "header.php";
?>
<div class="taak">
    <a href="addtask.php">Voeg taak toe</a>
</div>



<?php
    include "footer.php";
?>