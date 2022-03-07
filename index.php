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
    $query = "SELECT * FROM `taak` WHERE deleted IS NULL AND user_id='".$_SESSION["user_id"]."' ORDER BY id DESC";
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
    <h1>Taken</h1>
</div>
    <?php if (!isset($taak)): 
    echo "<h1>je hebt geen taken</h1>";    
        else: 
        ?>
    <?php foreach ($taak as $row): ?> 
    <ul>
        <li>
        <table>
            <tr>
            <a href="taak.php?id=<?php echo $row['id']?>">
            <?php if(isset($row['closed'])):?>
                <h2><s><?php echo $row['task']?></s></h2>
            <?php else: ?>
                <h2><?php echo $row['task']?></h2>
            <?php endif; ?>
            </a>
            </tr>
        </table>
        </li>
    </ul>
    <?php endforeach; ?>
    <?php endif; ?>
<?php
    include "footer.php";
?>
