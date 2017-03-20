<?php

namespace App\Templates;

foreach ($data[0] as $key => $value) {
    echo '<pre>';
    echo "$key => $value";
    echo '</pre>';
}
//header('Location: article.php?id=' . $id);

//echo '<a href=index.php>Back to the main page</a>';