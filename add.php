<?php 
if(isset($_POST['name'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $content = $_POST['content'];
    if(isset($_FILES['image']) && $_FILES['image']['name'] != null){
        $newDir ='uploads/'. date('m') .'-' . date('y');
        if(!file_exists($newDir) && !is_file($newDir)){
            mkdir($newDir);
        }
        $file_name = $_FILES['image']['name'];
        $image = $newDir .'/'.$file_name;
        $tmp_name = $_FILES['image']['tmp_name'];
        // thực hiện uploads
        move_uploaded_file($tmp_name,$newDir.'/'.time().$file_name);
    }

$connect = mysqli_connect('localhost', 'root', '', 'demo');
if(!$connect){
    die("connect failed").mysqli_connect_errno();
}
$sql = "INSERT INTO `products`(`name`, `price`,`image`, `content`) VALUES ('$name', $price,'$image', '$content')";
mysqli_query($connect,$sql);
}
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
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">name</label>
        <input type="text" name="name" placeholder="name">
        <input type="text" name="price" placeholder="price">
        <input type="file" name="image">
        <input type="text" name="content" placeholder="content">
        <button>add</button>
    </form>
</body>
</html>