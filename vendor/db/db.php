<?php
namespace DB;
include('../Models/Model.php');

use Model\Sales;

class DB
{
    /* Переменные для соединения с базой данных */
    private $hostname = "127.0.0.1";
    private $username = "root";
    private $password = "root";
    private $dbName = "testprog";
    public function Get()
    {

        $list = array();
        /* создать соединение */
        $mysqli = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbName) or die("Не могу создать соединение ");

        /* выбрать базу данных. Если произойдет ошибка - вывести ее */
        // mysqli_select_db($dbName) or die(mysql_error());  

        /* Выполнить запрос. Если произойдет ошибка - вывести ее. */
        // $result = mysql_query( 'SELECT * FROM SALES ORDER BY Area DESC LIMIT 5') or die(mysql_error()); 
        $result = mysqli_query($mysqli, 'SELECT * FROM SALES') or die(mysqli_error());

        /* Выборка результатов запроса */
        while ($row = mysqli_fetch_row($result)) {
            $sales = new Sales(intval($row[0]), $row[1], $row[2], $row[3]);
            array_push($list, $sales);
        }
        /* Освобождаем используемую память */
        mysqli_free_result($result);
        return $list;
    }
}


