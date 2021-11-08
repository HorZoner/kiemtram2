<?php
include_once 'server.php';
$display = 'SELECT * FROM products';
$stmt  = $conn->query( $display );
$stmt->setFetchMode(PDO::FETCH_OBJ);
$row   = $stmt->fetch();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $id = $_GET['id'];
    $sql = "UPDATE products 
            SET name_products = '$name', type = '$type', price = '$price', quantity = '$quantity', description = '$description'
            WHERE id_products = '$id'";
    $conn->query($sql);
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
<h2 class="fw-bold">Chỉnh sửa</h2>
<form action="" method="post">
    <table>
        <tbody>
        <tr>
            <td>Tên Hàng: </td>
            <td>
                <input type="text" name="name" value="<?php echo $row->name_products; ?>" required>
            </td>
        </tr>
        <tr>
            <td>Loại hàng: </td>
            <td>
                <select name="type">
                    <option value="Điện Thoại">Điện Thoại</option>
                    <option value="Điều Hòa">Điều Hòa</option>
                    <option value="Tủ lạnh">Tủ lạnh</option>
                    <option value="...">...</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Giá: </td>
            <td>
                <input type="text" name="price" value="<?php echo $row->price; ?>" required>
            </td>
        </tr>
        <tr>
            <td>Số lượng: </td>
            <td>
                <input type="text" name="quantity" value="<?php echo $row->quantity; ?>"required>
            </td>
        </tr>
        <tr>
            <td>Mô tả: </td>
            <td>
                <textarea name="description"><?php echo $row->description; ?></textarea>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-success">Hoàn tất</button>
                <a href="page1.php"><button type="button" class="btn btn-success">Thoát</button></a>
            </td>
        </tr>
        </tbody>
    </table>
</form>
</body>
</html>
