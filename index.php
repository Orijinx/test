<?php

namespace Index;

include(__DIR__ . '\vendor\db\db.php');

use vendor\DataBase\DB;

// ПРостенький рутинг для приведения образа работы приложения к MVC

switch ($_SERVER['REQUEST_METHOD']) { //Проверяем тип запроса
    case 'GET': {
            if ($_SERVER['REQUEST_URI'] == '/') {//Проверяем точку вхождения в приложение
                return readfile('main.php');//Возвращаем страничку
            } elseif ($_SERVER['REQUEST_URI'] == '/getinfo') {
                header('Content-Type: application/json');
                $data = new DB(); //используем класс ДБ для работы с бд и получения коллекции(Лист) с данными
                $result = json_encode($data->get(), JSON_UNESCAPED_UNICODE); //сереализуем данные
                echo $result;//Получаем API метод
            } 
            elseif ($_SERVER['REQUEST_URI'] = '/getorderbydate') {
                header('Content-Type: application/json');
               echo "Not method Post";
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
