<?php
$dsn = "mysql:host=localhost;port=3306;dbname=test;charset=utf8mb4" ;
$user = "root" ;
$pass = "" ;

try{
    $db = new PDO($dsn, $user, $pass);
}catch (PDOException $ex){
    header("Location: error.php") ;
    exit;

}
function getBike($id)
{
    global $db;
    $stmt=$db->prepare("SELECT * FROM motorbikes WHERE id = ? ");
    $stmt->execute([$id]);

    return $stmt->fetch();
}

