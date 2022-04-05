<?php
session_start();
header("location: login.php");
session_unset();
session_destroy();
?>