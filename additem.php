<?php
include "dynamic/DBController.php";
$title = $_POST["title"];
$description = $_POST["description"];
$price = $_POST["price"];
$location = $_POST["location"];
$sql = "insert into items (title, description, price, location) values(?,?,?,?)";
$statement = $pdo -> prepare($sql);
try{
    $statement -> execute(array($title, $description, $price, $location));
    echo "Insert Successfull";
}
catch(Exception $E){
    die($E);
    exit;
}

$uploaddir = 'images/';
$uploadfile = $uploaddir . basename($_FILES['fileupload']['name']);

$filename=basename($_FILES['fileupload']['name']);




try{

    move_uploaded_file($_FILES['fileupload']['tmp_name'], $uploadfile);
    print_r($_FILES);

}catch(Exception $e)
{
    echo "File upload failed\n";

    exit;
}
header("location: items.php");


?>