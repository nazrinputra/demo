<?php
include 'config/db.php';

if ($logged_in) {
    header("Location:dashboard.php");
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

<h1>Please <a href="login.php">login</a> to view users</h1>

</html>