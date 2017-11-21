<?php
/**
 * Created by PhpStorm.
 * User: dodev
 * Date: 09/10/17
 * Time: 10:17
 */

include 'Database.php';
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

$link = mysqli_connect('127.0.0.1', 'application', 'client777', 'sghe');

switch($_POST['action']){

    case 'getSession':
        echo $_SESSION['login_type'];
        break;

    case 'logof':
        unset($_SESSION["login_type"]);
        unset($_SESSION["login_user"]);
        break;

    case 'insertProf':
        $nome = $_POST['name'];
        $login_id = $_POST['loginId'];
        $query = "insert into professor values(default, '$nome', $login_id)";
        if($link->query($query)){
            echo 1;
        }else{
            echo -1;
        }

        break;

    case 'insertUser':
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $type = $_POST['type'];
        $status = $_POST['status'];

        $query = "insert into login values(default,'$user',sha2('$pass',256),'$type','$status')";
        if($link->query($query)){
            echo $link->insert_id;
        }else{
            echo -1;
        }
        break;

    case 'selectUser':
        $login_data = [];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $query = "select * from login where login_user='$user' and login_pass=sha2('$pass',256)";
        $result = $link->query($query);
        $result_arr = mysqli_fetch_assoc($result);
        array_push($login_data, $result->num_rows, $result_arr['login_status'], $result_arr['login_type']);
        $_SESSION['login_type'] = $result_arr['login_type'];
        $_SESSION['login_user'] = $result_arr['login_user'];
        echo json_encode($login_data, JSON_FORCE_OBJECT);
        break;

}

$link->close();

?>