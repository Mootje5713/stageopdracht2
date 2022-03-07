<?php
include "connection.php";
    $query = "SELECT * FROM `taak` WHERE user_id='".$_SESSION["user_id"]."' AND id = ".$_GET['id'];
    $result=$conn->query($query);
    if ( $conn->query($query) === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc())
            {
                $taak = $row;
            }
        }
}

$query = "SELECT * FROM `interactie` WHERE taak_id='".$_GET["id"]."' ORDER BY id DESC";
    $result=$conn->query($query);
    if ( $conn->query($query) === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows>0) {
            while($row=$result->fetch_assoc())
            {
                $status[] = $row;
            }
        }
    }

    $conn->close();
?>
<h1><?php echo $taak['task']; ?></h1>

<h2>Interacties</h2>

<!--foreach-->
<!-- actie -->
<!--endforeach -->

<?php foreach ($status as $row): ?> 
    <ul>
        <li>
        <table>
            <tr>
            <h3><?php echo $row['acties']?></h3>
            <h3><?php echo $row['tijdstip']?></h3>
            </tr>
        </table>
        </li>
    </ul>
    <?php endforeach; ?>

    <div class="del">
        <a href="deltask.php?id=<?php echo $taak['id']?>">taak verwijderen</a>
    </div>
<?php
    "footer.php";
?>