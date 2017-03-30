hello! I'm a readme file!

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