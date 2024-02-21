<?php

setcookie('character', '', time() - 3600);

header('Location: index.php');

?>
