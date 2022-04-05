<?php
$uploaddir = 'images/';
$uploadfile = $uploaddir . basename($_FILES['fileupload']['name']);




try{

    move_uploaded_file($_FILES['fileupload']['tmp_name'], $uploadfile);
    

}catch(Exception $e)
{
    echo "File upload failed\n";

    exit;
}
?>