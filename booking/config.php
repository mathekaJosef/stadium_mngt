<?php
session_start();
if(!empty($_SESSION["username"])) {

    require_once 'index.php';

} else {
    require_once 'login.php';
}
?>