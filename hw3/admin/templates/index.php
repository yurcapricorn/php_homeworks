<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin-panel</title>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin-panel</title>
</head>
<body>

<h1 align="center">Admin Panel</h1>

<table border="solid">
    <th>ID</th>
    <th>TITLE</th>
    <th>LEAD</th>
    <th>AUTHOR</th>
    <th>EDIT</th>
    <th>DELETE</th>
    <?php foreach($articles as $article){ ?>
    <tr><td>
        <?= $article->id; ?>
    </td>
        <td>
            <?= $article->title; ?>
        </td>
        <td>
            <?= $article->lead; ?>
        </td>
        <td>
            <?= $article->author->name . ' ' . $article->author->surname; ?>
        </td>
        <td><a href="<?='/admin/edit.php?id=' . $article->id; ?> "> <button>EDIT</button> </a></td>
        <td><a href="<?='/admin/delete.php?id=' . $article->id; ?> "> <button>DELETE</button> </a></td>
    <tr>
        <?php }; ?>
    </tr>
</table>

<br>
<div class="inputform" align="center"> <h2> ADD FORM </h2>
    <form>
        <p><textarea title="title" name="title" rows="3" cols="150" required > Article Title </textarea>
        <p><textarea title="lead" name="lead" rows="20" cols="150" required > Article Lead </textarea>
        <p><input title="author_id" name="author_id" value="author id"/></p>
        <p class="form-submit">
            <input type="submit" formmethod="POST" formaction="/admin/save.php" value="ADD">
        </p>
    </form>
</div>

</body>
</html>