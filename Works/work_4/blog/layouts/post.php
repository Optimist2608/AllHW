<?php
require_once dirname(__DIR__) . "/functions/searchPost.php";
$searchPost = searchPost("/data/posts.json");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<?php include dirname(__DIR__) . '/components/header.php'; ?>
<?php if (!is_null($searchPost)) : ?>
    <main class="detail-post-container">
        <div class="detail-post-head">
            <h2 class="detail-post-title"><?= $searchPost["title"] ?></h2>
            <p class="detail-post-date"><?= $searchPost["date"] ?></p>
        </div>
        <div class="detail-post-footer">
            <p class="detail-post-description"><?= $searchPost["description"] ?></p>
            <p class="detail-post-author"><?= $searchPost["author"] ?></p>
        </div>
    </main>
<?php else: ?>
    <p class="detail-error">Пост не найден, 404</p>
<?php endif; ?>
</body>
</html>