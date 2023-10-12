___________________________
h\w_8:

Выберите фреймворк из списка: T4, Symfony, Zend Framework 2, Yii 2, Laravel
Разверните на нем веб-приложение
Реализуйте на выбор один из следующих проектов:
Фан-сайт вашей любимой музыкальной группы
Сайт, посвященный вашему любимому автору художественной литературы
Сайт про ваш коллектив (трудовой, или группу в институте, или класс в школе, или просто группу друзей)
* свободная тема, на выбор
Обязательные требования:
MVC
Админ-панель
База данных, миграции, модели, связи
Соответствие современным стандартам разработки

hello! I'm a readme file.
________________________________
bugfixing


________________________________
h\w_8 progress:

Web application is to assist design patterns and basic OOP principles memorising

Created using basic package of YII2

-MVC representedby:

    -Controllers:

        -AdminController
        -AuthorController
        -CategoryController
        -SiteController
        -UserController

    -Models:

        -Article
        -Author
        -Category
        -Image
        -LoginForm
        -User

    -Views:

        -for site main page(index page, view page(one article), author page, error page)
        -for admin panel(crud actions pages for article, user, author, category)

-Admin panel represented by:

    -Controllers:

        -AdminController
        -AuthorController
        -CategoryController
        -UserController

    Models:

        -Article
        -Author
        -Category
        -Image
        -User

    Views:

        -for admin panel(crud action pages for article, user, author, category)

Database consists of 4 tables:

    -Article table
    -Author table
    -Category table
    -User table

Migrations:

    -m170504_135030_create_article_table.php
    -m170504_135051_create_user_table.php
    -m170506_165035_create_category_table.php
    -m170507_093942_create_author_table.php

Models:

    -Article
    -Author
    -Category
    -Image
    -LoginForm
    -User

Relations:

    Article relates to:

        -Category
        -Author
        -Image
        
Database copy: yii2.sql

username: user

password: password

______