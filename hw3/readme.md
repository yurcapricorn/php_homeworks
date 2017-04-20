hello! I'm a readme file!

bugfixing 09-04-2017

1.https://github.com/yurcapricorn/php_homeworks/blob/master/hw3/protected/App/SomeMagic.php#L34
Зачем вы давите ошибку, если свойство не найдено? Почему именно false?

-fixed.

2.https://github.com/yurcapricorn/php_homeworks/blob/master/hw3/protected/App/Models/Article.php#L51
- ненужные строки какие-то опять

-fixed

bugfixing 06-04-2017

Комментарий преподавателя:
1. https://github.com/yurcapricorn/php_homeworks/blob/master/hw3/protected/App/Models/SomeMagic.php
Это не модель. Ошибка.

-fixed. SomeMagic.php moved to App/ folder

2. https://github.com/yurcapricorn/php_homeworks/blob/master/hw3/protected/App/Models/SomeMagic.php#L42
Идиотское условие. Ошибка.

-fixed. condition from SomeMagic __set method removed.

3. Возвращать что-либо из __set() не следует - это ошибка.

-fixed. all return statements removed

4. https://github.com/yurcapricorn/php_homeworks/blob/master/hw3/protected/App/Models/SomeMagic.php#L69
Полная чушь написана.

-fixed. method __isset now contains
     public function __isset($key)
     {
         return isset($this->data[$key]);
     }
     
__________________________________

/**
 * Повторите код, изученный на уроке.
 * Выделите ту часть, которая управляет установкой и чтением произвольных свойств объекта в трейт.
 * Не забудьте добавить реализацию метода __isset().
Добавьте к своим данным еще одну таблицу - авторы новостей (authors).
 * В таблице новостей, соответственно, добавите поле author_id. 
 Модифицируйте модель новостей следующим образом:
Если запрашивается поле ->author, то сначала проверяем поле ->author_id
Если оно не пусто - делаем запрос к таблице authors и возвращаем результат 
в виде объекта класса Author
Не забудьте снабдить модели соответствующим PHPDoc.
Измените шаблоны своего приложения, добавьте везде вывод авторов новостей
 * Изучите интерфейсы Countable и Iterator и реализуйте его в своем приложении в классе View
 */