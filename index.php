<?php

namespace Index;

include(__DIR__ . '\vendor\db\db.php');

use vendor\DataBase\DB;

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET': {
            if ($_SERVER['REQUEST_URI'] == '/') {
                return readfile('main.php');
            } elseif ($_SERVER['REQUEST_URI'] == '/getinfo') {
                header('Content-Type: application/json');
                $data = new DB();
                $result = json_encode($data->get(), JSON_UNESCAPED_UNICODE);
                echo $result;
            } 
            elseif ($_SERVER['REQUEST_URI'] = '/getorderbydate') {
                header('Content-Type: application/json');
               echo "Not method Post";
               echo $_GET['min'];
               echo $_GET['max'];
            }
            break;
        }




    case 'POST': {
            if ($_SERVER['REQUEST_URI'] = '/getorderbydate') {
                header('Content-Type: application/json');
                $min =$_POST['min'] ;
                $max =$_POST['max'];
                $data = new DB();
                $result = json_encode($data->GetOrderByDate($min,$max), JSON_UNESCAPED_UNICODE);
                echo $result;
            }
            break;
        }
}
