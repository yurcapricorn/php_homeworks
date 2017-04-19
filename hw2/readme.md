hello! I'm a readme file!

bugfixing 08-04-2017

Комментарий преподавателя:
1. https://github.com/yurcapricorn/php_homeworks/blob/master/hw2/protected/App/Config.php#L19
А одной строчкой записать слабо? А?

-fixed "$this->data = include...."

2. Больше переменных, временных и никому не нужных, больше!!!
Особенно это видно тут: https://github.com/yurcapricorn/php_homeworks/blob/master/hw2/protected/App/Db.php#L30
О да, дайте мне еще десяток переменных ))

-fixed. construction  
       
foreach ($config->data['db'] as $key => $val) {
                                 $$key = $val;
                             }
used

3. https://github.com/yurcapricorn/php_homeworks/blob/master/hw2/protected/App/Models/Model.php#L107
и
https://github.com/yurcapricorn/php_homeworks/blob/master/hw2/protected/App/Models/Model.php#L111
Дубль

-fixed. Model method update() fixed

4. https://github.com/yurcapricorn/php_homeworks/blob/master/hw2/protected/App/Models/Model.php#L110
Я не понял, а где вы используете ЗНАЧЕНИЯ этого массива? Ключи - вижу где, а значения?

-fixed. Model method update() fixed

https://github.com/yurcapricorn/php_homeworks/blob/master/hw2/admin/index.html
Что за бредятина? Я захожу в админ-панель и что вижу? Форму? И что мне с ней делать?

-fixed /admin/index.html

bugfixing 04-04-2017

1. Блин, когда же вы отучитесь от многословности?
https://github.com/yurcapricorn/php_homeworks/blob/master/hw2/Config_file.php#L2 - зачем ТАК писать? ЗАЧЕМ?
Почему нельзя ПРОЩЕ? return [ 'db' => ... ];
Важный принцип хорошего программиста "А могу ли я сократить еще на одну строчку?"

-fixed /Config_file.php
return ['db' => ['host' => 'localhost', 'name' => 'php2', 'user' => 'root', 'pass' => '']];

2. https://github.com/yurcapricorn/php_homeworks/blob/master/hw2/protected/App/Models/Model.php#L110
Ошибка. Минус балл. Вы не сможете записать в числовое поле число ноль, в текстовое - пустую строку.

-fixed /protected/App/Models/Model.php
if (!isset($v)||empty($v)) {
    continue;
    }
strings removed

3. https://github.com/yurcapricorn/php_homeworks/tree/master/hw2/admin
Я захожу по адресу /admin/ - вижу 404. Нет никакой админ-панели по-прежнему. Потому что нет ее стартового "индексного" файла. Минус второй балл.
Набор файлов, который вы положили в папку admin не представляет из себя ничего цельного, я не смог понять - что там за что отвечает.
Переделать.

-fixed. file admin.html moved to /admin/ folder and renamed to index.html

_______________________________
1.
https://github.com/yurcapricorn/php_homeworks/blob/master/hw2/protected/App/Config.php#L20
Зачем эта строчка? Нельзя было сразу в конфиге предусмотреть секцию 'db'? Как же вы любите всё усложнять...

-fixed.
Config_file now contains {
    $mas['db']=['host' => 'localhost', 'name' => 'php2', 'user' => 'root', 'pass' => ''];
    return $mas;
}

2.
https://github.com/yurcapricorn/php_homeworks/blob/master/hw2/protected/App/Models/Model.php#L106
Вы пытаетесь обновлять поле id. Это ошибка.

-fixed.
Class Model method Update now contains {
            foreach ($this as $k => $v) {
                if ($k == 'id') {
                    $val[':' . $k] = $v;
                    continue;
                    }
                ........
            }
to prevent update() from attempts to rewrite id field in database;

3.
Но это как бы всё ерунда. Печальнее то, что я не нашел никакой админ-панели. Видимо, вы ее хорошо спрятали. А жаль, в этот раз код даже можно было бы назвать приемлемым...

-fixed.
admin and article folders moved to root folder

4.
P.S. Вы хоть файл readme заведите, что ли...

-fixed.
it is the file.

______________________________

HW-2

1. Добавьте в свое приложение класс App\Config.
Объект этого класса при создании должен читать и сохранять в себе файл конфигурации.
 Его применение:
$config = new \App\Config;
echo $config->data['db']['host'];
// пусть это пока коряво смотрится, но по-другому мы еще не умеем

2. Если на уроке изучали метод insert(), то продумайте и реализуйте метод update().
Его задача - обновить поля модели, которая ранее была получена из базы данных.
Используйте поле id для понимания того, какую запись нужно обновлять!

3. Если же уже изучили update() - напишите метод insert().
Он вставляет в базу данных новую запись, основываясь на данных объекта.

4. Не забудьте, что после успешной вставки вы должны заполнить свойство id объекта!

5. Реализуйте метод save(), который решит - "новая" модель или нет и, в зависимости от этого, вызовет либо insert(), либо update().

6. Добавьте к моделям метод delete()

7. На базе реализованного вами кода сделайте простейшую (!) админ-панель новостей
с функциями добавления, удаления и редактирования новости.

8. * Изучите что такое синглтон (слайды + консультация в чате поддержки) и сделайте класс App\Config синглтоном.