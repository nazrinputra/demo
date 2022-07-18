<?php
include 'config/db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password_login = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email='{$email}'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result);

    if (is_array($row)) {
        $password_db = $row['password'];
        if (password_verify($password_login, $password_db)) {
            $_SESSION['id'] = $row['id'];
            echo '
            <script>
                alert("Login Successful!");
                window.location.href="index.php";
            </script>';
        }
    } else {
        echo "Invalid email or password";
    }
}
?>

<html>
<ul>
    <li><a href="index.php">Home</a></li>
    <?php
    if ($logged_in) {
        // link for logged in users
    ?>
        <li><a href="add_user.php">Add User</a></li>
        <li><a href="logout.php">Log Out</a></li>
    <?php
    } else {
        // link for guests
    ?>
        <li><a href="login.php">Log In</a></li>
    <?php
    }
    ?>
</ul>

<form action="" method="POST">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email"><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br>

    <br>
    <input type="submit" value="Login" name="login">
</form>

</html>