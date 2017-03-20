<?php

//include __DIR__ . '/autoload.php';

error_reporting(E_ALL);
ini_set("display_errors", 1);
include("errors.php");

//class A
//{
//    public $a;
//    public $name;
//}
//$c= new A();
//$name='a';
//$value=1;
//$c->{$name} = $value;
//
//var_dump($c);

//$a=parse_ini_file('config/config.ini');

//var_dump($a);
//\App\DbNewsFiller::fill(150);

//\App\Models\News::displayAll();

//ДОМАШНЯЯ РАБОТА 3
//
//Повторите код, изученный на уроке. Выделите ту часть, которая управляет установкой и чтением произвольных свойств объекта в трейт.
// Не забудьте добавить реализацию метода __isset().
//Добавьте к своим данным еще одну таблицу - авторы новостей (authors).
// В таблице новостей, соответственно, добавите поле author_id. Модифицируйте модель новостей следующим образом:
//Если запрашивается поле ->author, то сначала проверяем поле ->author_id
//Если оно не пусто - делаем запрос к таблице authors и возвращаем результат в виде объекта класса Author
//Не забудьте снабдить модели соответствующим PHPDoc.
//Измените шаблоны своего приложения, добавьте везде вывод авторов новостей
//* Изучите интерфейс SPL ArrayAccess ( http://php.net/manual/ru/class.arrayaccess.php )
// Придумайте применение этому поведению, реализуйте его в каком-либо классе своего приложения
//* Изучите интерфейс Iterator и реализуйте его в своем приложении

//echo '<pre>';
//var_dump($article);
//echo '</pre>';

//Test\Test::dbTest();

include __DIR__ . '/Js/index.html';