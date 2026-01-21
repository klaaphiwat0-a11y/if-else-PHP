<?php
$productPrice = 0;
$weight  = 0;
$isMember = false;
$shippingFree = 0;
$discount = 0;
$results = 0;

if (isset($_POST['submit'])) {
    $productPrice = (float) $_POST['productPrice']; 
    $weight = (float) $_POST['weight'];

    $isMember = isset($_POST['isMember']);

    if ($productPrice >= 2000) {
        $shippingFree = 0;
    } elseif ($weight <= 2) {
        $shippingFree = 50;
    } elseif ($weight <= 10) {
        $shippingFree = 100;
    } else {
        $shippingFree = 200;
    }


    if ($isMember === true && $productPrice >= 3000) {
        $discount = $productPrice * 10 / 100;
    } elseif ($isMember === true && $productPrice < 3000) {
        $discount = $productPrice * 5 / 100;
    } else {
        $discount = 0;
    }

    $results = $productPrice - $discount + $shippingFree;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คำนวณ</title>
</head>

<body class="body">
    <form method="POST">
        ราคาสินค้า <input type="text" name="productPrice"><br>
        น้ำหนักสินค้า <input type="text" name="weight"><br>
        สมาชิก <input type="checkbox" name="isMember"><br>
        <button type="submit" name="submit" >คำนวณ</button>
    </form>

    <p>ราคาสินค้าต้นทุน <?php echo $productPrice; ?></p>
    <p>ค่าจัดส่งที่คำนวณได้ <?php echo $shippingFree; ?></p>
    <p>ส่วนลดที่ได้รับ <?php echo $discount; ?></p>
    <p>ราคาสุทธิที่ต้องจ่าย <?php echo $results; ?></p>
</body>

</html>
