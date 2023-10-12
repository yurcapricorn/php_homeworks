<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All news</title>
</head>
<body>

<section>
        {% for article in articles %}
    <article>
        <a href="/News/One/?id={{ article.id }}">
            <h2>{{ article.title }}</h2>
        </a>
        <h3>
            {{ article.author.name }}
            {{ article.author.surname }}
        </h3>
        <div>{{article.lead}}</div>
    </article>
    <hr>
    {% endfor %}
</section>


</body>
</html>