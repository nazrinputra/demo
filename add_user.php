<?php
include 'config/db.php';
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
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br>

    <br>
    <input type="submit" value="Submit" name="submit">
</form>

</html>

<?php
if (isset($_POST['submit'])) {
    $name_register = $_POST['name'];
    $email_register = $_POST['email'];
    $password_register = $_POST['password'];

    $password_hash = password_hash($password_register, PASSWORD_DEFAULT);

    $sql = "INSERT into `user` (name, email, password) VALUES ('{$name_register}', '{$email_register}', '{$password_hash}')";

    $sqlQuery = mysqli_query($connection, $sql);

    if (!$sqlQuery) {
        die("Database connection not established. " . mysqli_error($connection));
    }

    header("Location:index.php");
}
?>