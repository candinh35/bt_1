<?php
 require_once 'config.php';
$connect = mysqli_connect('localhost', 'root', '', 'demo');
if (!$connect) {
    die('connect failed') . mysqli_connect_errno();
}

$sql = 'SELECT * FROM products';
$result = mysqli_query($connect, $sql);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <table border="1" cellpadding=10>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Content</th>
                    <th>lua chon</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['price'] ?></td>
                        <td><img width="20px" height="20px" src="<?php echo BASE_URL.$row['image'] ?>" ></td>
                        <?php echo BASE_URL.$row['image'] ?>
                        <td><?php echo $row['content'] ?></td>
                        <td>
                            <a href="delete.php?id=<?php echo $row['id']?>">xoa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                <tr>
                    <td><a href="add.php">them</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>