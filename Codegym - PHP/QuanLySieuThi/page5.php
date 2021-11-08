<?php
require_once 'server.php';
$id = $_GET['id'];
$getname = 'SELECT name_products FROM products WHERE id_products ='.$id;
$stmt = $conn->query($getname);
$stmt->setFetchMode(PDO::FETCH_OBJ);
$row   = $stmt->fetch();
$name = $row->name_products;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $delete = 'DELETE FROM products WHERE id_products ='.$id;
    $conn->query($delete);
    echo '<script>alert("Success!");window.location = "page1.php"</script>';
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<h2 class="fw-bold">Xoá mặt hàng</h2>
<p>bạn có chắc chắn muốn xóa mặt hàng <?php echo $name; ?>?</p>
<div class="container">
    <a href="page1.php">
        <button type="button" class="btn btn-success">Thoát</button></a>
    <form action="" method="post">
        <button type="submit" class="btn btn-success">Xóa mặt hàng</button></form>
</div>
</body>
</html>