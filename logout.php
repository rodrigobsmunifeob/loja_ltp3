<?php
/**
 * Created by PhpStorm.
 * User: WLF
 * Date: 25/04/17
 * Time: 23:13
 */

session_start();
session_destroy();
header("Location: index.php");

?>