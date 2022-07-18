<?php
include 'config/db.php';

$sql = "SELECT * FROM user";
$result = mysqli_query($connection, $sql);
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

<table>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><a href="edit_user.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
            <td><a href="delete_user.php?delete=<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
    <?php
    }
    ?>
</table>

</html>