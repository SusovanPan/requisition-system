<?php

include "../config/db.php";

session_start();

session_unset();

session_destroy();

header("Location: http://localhost/requistion/index.php")


?>
