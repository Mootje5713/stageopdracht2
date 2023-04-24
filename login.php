<?php
include "connection.php";
if (isset($_POST['username']) && ($_POST['wachtwoord'])) {
    $username =  $_POST['username'];
    $password =  $_POST['wachtwoord'];
    $query = "SELECT * FROM `user` WHERE username = '$username'";
    $result = $conn->query($query);
    if ($result === FALSE) {
        echo "error" . $query . "<br />" . $conn->error;
    } else {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (password_verify($password, $row['wachtwoord'])) {
                    $_SESSION["user_id"] = $row['id'];
                    $_SESSION["username"] = $row['username'];
                } else {
                    echo "Wachtwoord niet gevonden!";
                }
            }
        } else {
            echo "Gebruiker niet gevonden!";
        }
    }
}
if (isset($_SESSION['user_id'])) {
    header('Location: index.php');
}
$conn->close();
?>

<form method="POST">
    username <input type="text" name="username" id="username" required>
    <br>
    password <input type="password" name="wachtwoord" id="wachtwoord" required>
    <br>
    <input type="submit" name="submit" value="sign in">
    nog geen account <a href="register.php">klik hier</a>
</form>
</body>

</html>