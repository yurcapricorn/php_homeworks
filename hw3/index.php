<?php

require_once __DIR__ . '/protected/autoload.php';

//include __DIR__ . '/protected/templates/admin.html';
//
//$data = App\Models\Article::findLastEntries();
//
//include __DIR__ . '/protected/templates/news_index.html';


//$article= \App\Models\Article::findById(1);
////var_dump($article);
//$res=$article->author;
//var_dump($res);

include __DIR__ . '\protected\View.php';
/**
 * Повторите код, изученный на уроке.
 * Выделите ту часть, которая управляет установкой и чтением произвольных свойств объекта в трейт.
 * Не забудьте добавить реализацию метода __isset().
Добавьте к своим данным еще одну таблицу - авторы новостей (authors).
 * В таблице новостей, соответственно, добавите поле author_id. Модифицируйте модель новостей следующим образом:
Если запрашивается поле ->author, то сначала проверяем поле ->author_id
Если оно не пусто - делаем запрос к таблице authors и возвращаем результат в виде объекта класса Author
Не забудьте снабдить модели соответствующим PHPDoc.
Измените шаблоны своего приложения, добавьте везде вывод авторов новостей
 * Изучите интерфейсы Countable и Iterator и реализуйте его в своем приложении в классе View
 */