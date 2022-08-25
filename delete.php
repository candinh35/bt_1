<?php
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $connect = mysqli_connect('localhost', 'root', '', 'demo');
    if (!$connect) {
        die('connect failed') . mysqli_connect_errno();
    }

    $sql = "DELETE  FROM products WHERE id=$id";
    mysqli_query($connect,$sql);
        header('location:list_demo.php');
}
