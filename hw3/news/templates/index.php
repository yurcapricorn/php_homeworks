<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>NEWS</title>
</head>
<body>
<?php
    foreach($articles as $article){
?>

<div>
    <h1>
        <a href=" <?= '/news/article.php?id=' . $article->id; ?>
        ">
            <?php
                echo $article->title;
            ?>
        </a>
    </h1>

    <h2>
        <?php
            if (!empty($article->author_id)){
                echo $article->author->name . ' ' . $article->author->surname;
            }
        ?>
    </h2>

    <p>
        <?php
            echo $article->lead ;}
        ?>
    </p>

</div>

</body>
</html>