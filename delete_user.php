<?php
include 'config/db.php';

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $sql = "DELETE FROM user WHERE id={$delete_id}";
    $result = mysqli_query($connection, $sql);

    header("Location:index.php");
}
