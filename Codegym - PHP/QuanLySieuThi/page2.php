<?php
require_once 'server.php';
//Lấy tất cả từ bảng thể loại
$sql = "SELECT * FROM products";
//thực hiện truy vấn
$stmt = $conn->query($sql);
//tùy chọn kiểu trả về
$stmt->setFetchMode(PDO::FETCH_OBJ);
//lấy tất cả kết quả
$rows = $stmt->fetchAll();
if (isset($_POST['search'])) {
    $key = addslashes($_POST['search']);
    $sql = "SELECT * FROM products WHERE (LOWER (name_products) LIKE '$key' OR LOWER (type) LIKE '$key')";
    $KQ = $conn->query($sql);
    $KQ->setFetchMode(PDO::FETCH_OBJ);
    $lists = $KQ->fetchAll();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="text-center">
<h2>Kết quả tìm kiếm mặt hàng</h2>
<div style="text-align: right!important">
    <a href="page1.php">
        <button type="button" class="btn btn-success">Xem danh sách mặt hàng</button></a>
</div>
<table style="width: 100%;border: 1px solid;">
    <tbody>
    <tr class="bg-success text-white fw-bold">
        <td width="4%"><h3>#</h3></td>
        <td width="35%">Tên Hàng</td>
        <td width="36%">Loại Hàng</td>
        <td width="25%">&nbsp;</td>
    </tr>
    <?php foreach ( $lists as $row ) : ?>
        <tr>
            <td><?php echo $row->id_products ?></td>
            <td><?php echo $row->name_products ?></td>
            <td><?php echo $row->type ?></td>
            <td>
                <a href="">Chỉnh Sửa</a>
                <a href="">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>