<?php
session_start();
session_destroy();
header('Location:../NiceAdmin/pages-login.php');
?>