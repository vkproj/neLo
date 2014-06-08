<?php
include 'library.php';
session_destroy();
unset($_SESSION['id']);
unset($_SESSION['username']);
echo '<script type="text/javascript">window.location = "index.html"; </script>';
?>
