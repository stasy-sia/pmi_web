<?php
setcookie('user',$user['name'], time() - 3600, "/");
header('Location: ../../pages/regest.php');
?>