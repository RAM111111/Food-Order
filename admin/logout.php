<?php

include('../conf/constants.php');

session_destroy();

header('location:'.URL.'admin/login.php');

 ?>
