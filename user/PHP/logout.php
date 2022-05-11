<?php
session_start();
session_destroy();
header('location:../../user/page/index.php');
?>