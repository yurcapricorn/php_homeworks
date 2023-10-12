<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Article</title>
</head>
<body>

<div>
    <h1>
        <?php
            echo $article->title;
        ?>
    </h1>

    <h2>
        <?= $article->author->name . ' ' . $article->author->surname; ?>
    </h2>

    <p>
        <?php
            echo $article->lead ;
        ?>
    </p>

</div>

<div>
    <a href="/News/Default"> <button> ALL NEWS </button> </a>
</div>

</body>
</html>