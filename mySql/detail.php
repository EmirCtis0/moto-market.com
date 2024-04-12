

<?php
    require "db.php";

    $id=$_GET["id"];
    $motor=getBike($id);

        $photo_index = isset( $_GET["photo"]) ? $_GET["photo"] : 0 ;
        $rs = $db->prepare("SELECT * FROM motorbike_photo WHERE bike_id=?");
        $rs->execute([$id]);
       
        $stmt = $db->prepare("select * from motorbike_photo where bike_id = ?") ;
            $stmt->execute([$id]) ;
            $photos = $stmt->fetchAll() ;
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{border-collapse: collapse;}
        td,th{border-bottom: 1px solid black; padding: 10px 10px;}
        #small{width: 90px; }
        .border{border: 1px solid blue;}
    </style>
</head>
<body>
    <table>
        <tr>
        <th>
            <?= $motor['title'] ?>
        </th>
        </tr>
        <tr>
           <td> <img src="images/<?= $photos[$photo_index]['path'] ?>" class="profile"></td>
           <td>
            <table>
                <tr>
                    <th>
                        <?=$motor['price'] ?>
                    </th>
                </tr>
                <?php 
                    echo "<tr><td><b>Brand</b></td><td>{$motor['brand']}</td></tr>";
                    echo "<tr><td><b>Model</b></td><td>{$motor['model']}</td></tr>";
                    echo "<tr><td><b>Year</b></td><td>{$motor['year']}</td></tr>";
                    echo "<tr><td><b>KM</b></td><td>{$motor['km']}</td></tr>";
                    echo "<tr><td><b>Color</b></td><td>{$motor['color']}</td></tr>";
                    echo "<tr><td><b>Engine</b></td><td>{$motor['engine']}</td></tr>";
                
                ?>
                
            </table>
           </td>
        </tr>
        <tr>
            <td> <?php
                      $i = 0 ;
                      foreach( $photos as $photo) {
                          if ( $i == $photo_index) {
                          echo "<a href='?id=$id&photo=$i'><img src='images/{$photo['path']}' id='small' class='border'></a>" ;    
                          } else {
                          echo "<a href='?id=$id&photo=$i'><img src='images/{$photo['path']}' id='small'></a>" ;
                          }
                          $i++;
                      }
                    ?></td>
           
        </tr>
        <tr>
            <td><a href="main.php">BACK</a><a href="buy.php?id=<?=$id?>">|BUY</a></td>
            
        </tr>
    </table>
</body>
</html>