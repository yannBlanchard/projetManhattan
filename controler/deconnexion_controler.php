<?php
/**
 * Created by PhpStorm.
 * User: thaonzo
 * Date: 12/05/2015
 * Time: 13:49
 */

session_start();
session_destroy();
header('Location: ../index.php');
exit;

?>