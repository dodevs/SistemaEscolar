<?php
/**
 * Created by PhpStorm.
 * User: dodev
 * Date: 09/10/17
 * Time: 10:17
 */

include 'Database.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

$link = mysqli_connect('127.0.0.1', 'application', 'client777', 'sghe');

switch($_POST['action']){

    case 'insert':
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        break;

    case 'select':
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $query = "select * from login where login_user='$user' and login_pass=sha2('$pass',256)";
        $result = $link->query($query);

        echo $result->num_rows;

        break;

}

?>