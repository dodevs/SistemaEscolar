<?php
/**
 * Created by PhpStorm.
 * User: dodev
 * Date: 10/10/17
 * Time: 06:49
 */

class Database
{
    private $host = "localhost";
    private $user = "application";
    private $pass = "client777";
    private $_link;

    public function _construct($database){
        $this->_link = mysqli_connect($this->host, $this->user, $this->pass, $database);
    }
    public function _conn(){
        return $this->_link;
    }
}