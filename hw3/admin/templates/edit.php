<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Edit Article </title>
</head>
<body>

<div align="center"> <h2> EDIT FORM </h2>
    <form>
        <p> <strong> article id  <?= $article->id ?> </strong> </p>
        <p><textarea title="title" name="title" rows="3" cols="150" required > <?= $article->title; ?> </textarea>
        <p><textarea title="lead" name="lead" rows="20" cols="150" required > <?= $article->lead; ?> </textarea>
        <p><input title="author_id" name="author_id" size="1" value="<?= $article->author_id ?> " />Author ID</p>
        <p class="form-submit">
            <input type="submit" formmethod="POST" formaction="/admin/save.php?id=<?= $article->id ?>" value="EDIT">
        </p>
    </form>
</div>

</body>
</html>