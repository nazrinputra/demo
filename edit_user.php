<?php
include 'config/db.php';

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $sql = "SELECT * FROM user WHERE id={$edit_id}";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($result);
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
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />

    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required value="<?php echo $row['email']; ?>"><br>

    <label for="password">Password:</label><br>
    <input type="text" id="password" name="password" value="<?php echo $row['password']; ?>"><br>

    <br>
    <input type="submit" value="Update" name="update">
</form>

</html>

<?php
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE `user` SET name='{$name}', email='{$email}', password='{$password}' WHERE id={$id}";

    $sqlQuery = mysqli_query($connection, $sql);

    if (!$sqlQuery) {
        die("Database connection not established. " . mysqli_error($connection));
    }

    header("Location:index.php");
}
?>