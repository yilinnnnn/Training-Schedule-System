<?php
session_start();
session_destroy();
header("location:/training_system/index.php");
?>