<?php
require "db.php";

// Fetch motorbike data
try {
    $rs = $db->query("SELECT * FROM motorbikes");
    if ($rs) {
        $motors = $rs->fetchAll();
    } else {
        echo "Error fetching data.";
    }
} catch (PDOException $ex) {
    echo "An error occurred: " . $ex->getMessage();
    // Handle error gracefully, redirect to an error page or log the error
    // header("Location: error.php");
    // exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table { margin: 10px auto; border-collapse: collapse; }
        td { border: 1px solid black; padding: 5px 40px; text-align: left; }
        #first { background-color: yellow; }
        h1 { text-align: center; }
        img{width: 80px;}
        #stat{font-size: 20px;padding: 20px;}
    </style>
</head>

<body>
    <h1>moto-market.com</h1>
    <table>
        <tr id="first">
            <td></td>
            <td>Brand</td>
            <td>Model</td>
            <td>Title</td>
            <td>Price</td>
            <td>Discount</td>
            <td>Status</td>
        </tr>
        <?php foreach($motors as $motor) : ?>
        <tr>
            <td><a href="detail.php?id=<?=$motor['id'] ?>"><img src="images/<?= $motor['profile'] ?>" alt=""></a></td>
            <td><?= $motor['brand'] ?></td>
            <td><?= $motor['model'] ?></td>
            <td><?= $motor['title'] ?></td>
            <td><?= $motor['price'] ?></td>
            <?php $discount=preg_match('/^[A-Z]{2}\d{3}-\d{2}$/',$motor['coupon'])?'yes':'no';?>
            <td><?=$discount?></td> 
            <?php $stat=$motor["status"]?"sold":"on sale"; ?>
            <td id="stat"><?= $stat ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
