<?php
/**
 * Created by PhpStorm.
 * User: WLF
 * Date: 25/04/17
 * Time: 23:13
 */
session_start();
session_destroy();
unset($_SESSION);
header("Location: index.php");

?>