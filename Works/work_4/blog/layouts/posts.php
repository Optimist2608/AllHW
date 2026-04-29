<?php
require_once dirname(__DIR__) . "/functions/fileReader.php";
require_once dirname(__DIR__) . "/functions/isFilterPost.php";
$posts = fileReader("/data/posts.json");
$categories = fileReader("/data/categories.json");
$currentCategory = $_GET["category"] ?? null;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Posts</title>
    <link rel="stylesheet" href=".././style/style.css"/>
</head>
<body>
<?php include dirname(__DIR__) . '/components/header.php'; ?>
<h1>Посты</h1>
<div class="categories">
    <?php foreach ($categories as $category => $idArr) : ?>
        <a class="category" href="posts.php?category=<?= $category ?>"><?=  $category ?></a>
    <?php endforeach; ?>
</div>
<div class="posts-container">
    <?php foreach ($posts as $post) : ?>
        <?php if ((!is_null($currentCategory) && isFilterPost($post, $categories[$currentCategory])) || (is_null($currentCategory))) : //если есть категория и пост входит в категорию или не задана категория?>
            <div class="post">
                <div class="post-content">
                    <a href="post.php?id=<?= $post['id'] ?>" class="post-title"><?= $post["title"] ?></a>
                    <p class="post-description"><?= $post["description"] ?></p>
                </div>
                <div class="post-footer">
                    <p class="post-date">Дата: <?= $post["date"] ?></p>
                    <p class="post-author"><?= $post["author"] ?></p>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<script>
    const categoryAll = document.querySelectorAll(".category"); // в верхний регистр категории сделал в php 8.3 нет такого
    categoryAll.forEach(category => {
        let text = category.textContent;
        category.textContent = text[0].toUpperCase() + text.slice(1)
    })
</script>
</body>
</html>