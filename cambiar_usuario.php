<?php
    unset($_COOKIE['id_usuario']);
    setcookie("id_usuario", "", time() - 3600);
    header('Location:home.php');
    exit();
?>