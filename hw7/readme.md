hello! I'm a readme file.


________________________________

bugfixing :
 
 1. https://github.com/yurcapricorn/php_homeworks/blob/master/hw7/protected/App/AdminDataTable.php#L24
 Нахрена такие сложности? Чем хуже просто $this->funcs? 
 Что вы всё придумываете, Юрий? Почему у вас код получается... цветастый какой-то?
  
 -fixed.
 
 2. https://github.com/yurcapricorn/php_homeworks/blob/master/hw7/templates/admin/admindatatable.html#L15
 И чё? Чтобы вы ни удаляли - статью, автора, товар в магазине - будет одна и та же ссылка? Что за чушь?
 
 -fixed. link moved to Article model method
 
 3. https://github.com/yurcapricorn/php_homeworks/blob/master/hw7/protected/App/Controllers/Admin.php#L20
 Что это? Как это соотносится с заданием?
 
 -fixed. removed
 
 4. Первая часть - зачёт (сложно было не справиться). Часть с AdminDataTable - незачёт полный. 
 Массива функций я так и не увидел, нормальной таблицы в админке тоже.
 
 -functions array:
 https://github.com/yurcapricorn/php_homeworks/blob/master/hw7/protected/App/functions.php
 -table applied
 https://github.com/yurcapricorn/php_homeworks/blob/master/hw7/templates/admin/edit.html#L11

________________________________
h\w_7 progress:

-Generator method queryEach() in Db done

-Generator applied for /News/All controller action

-AdminDataTable class created

-admindatatable template created

-functions.php created

-AdminDataTable applied to admin template

_________________________________
h\w_7:

1. Примените генератор в классе Db. У вас уже есть метод, называющийся как-то вроде query(), 
который использует fetchAll() из PDO. 
Сделайте метод-копию queryEach(), который будет генерировать запись за записью из ответа сервера базы данных, 
не делая fetchAll(), а построчно исполняя fetch(). Проверьте работу этого метода, использовав его в программе.
2. Создайте класс AdminDataTable. 
Его конструктор принимает на вход массив моделей (это будут строки таблицы) и массив функций (это будут столбцы)
Метод render() отображает таблицу следующим образом:
Для каждой записи (это строка таблицы) последовательно вызываются функции (каждая - это столбец таблицы), в них передается запись (модель)
То, что вернула функция - становится значением ячейки таблицы
3. Примените этот класс в своей админ-панели