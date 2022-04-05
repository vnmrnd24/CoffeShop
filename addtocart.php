<?php
session_start();
$name=$_POST['name'];
$size=$_POST['size'];
$COUNT=sizeof($_SESSION['cart']);
$cartitem=array('name'=>$name,'size'=>$size);
if(!isset($_SESSION['cart'])){
    $_SESSION['cart']=array();
}
$_SESSION['cart'][$COUNT]=$cartitem;
echo sizeof($_SESSION['cart']);
exit;

?>