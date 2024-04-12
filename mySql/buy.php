<?php
    require "db.php";
    $id=$_GET["id"];
    $stmt=$db->prepare("UPDATE motorbikes SET status = 1 WHERE id= ? ");
    $stmt->execute([$id]);

    header("location: main.php");

    


?>