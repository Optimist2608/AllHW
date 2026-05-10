<?php
require_once __DIR__ . "/functions/get.php";
require_once __DIR__ . "/functions/debug.php";
require_once __DIR__ . "/functions/findIdBySlug.php";
require_once __DIR__ . "/functions/showError.php";
try {
    $posts = getPosts();
    $categories = getCategories();
    $currentCategorySlug = $_GET["category"] ?? null;
    $currentCategoryId = findIdBySlug($currentCategorySlug);

    if ($currentCategoryId !== null && ((int)$currentCategoryId > count($categories["categories"]) - 1 || (int)$currentCategoryId < 0)) {
        showError("Cлага $currentCategorySlug не существует");
    }
} catch (exception $e) {
    showError("Ошибка сервера: " . $e->getMessage(), false);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Posts</title>
    <link rel="stylesheet" href="/style/style.css"/>
</head>
<body>
<?php include __DIR__ . '/components/header.php'; ?>
<h1>Посты</h1>

<div class="categories">
    <?php if (!isset($error)) : ?>
        <?php foreach ($categories["categories"] as $category) : ?>

            <div class="category">
                <a class="category" href="posts.php?category=<?= htmlspecialchars($category["slug"]) ?>"
                   title="<?= htmlspecialchars($category["description"]) ?>">
                    <?= htmlspecialchars($category["title"]) ?>
                </a>
            </div>

        <?php endforeach; ?>
    <?php else: ?>
        <p class="detail-error"> <?= htmlspecialchars($error) ?> </p>
    <?php endif; ?>
</div>

<div class="posts-container">
    <?php if (!isset($error)) : ?>
        <?php foreach ($posts["posts"] as $post) : ?>
            <?php if ((int)$post["categoryId"] === (int)$currentCategoryId || $currentCategoryId === null) : ?>
                <div class="post">
                    <div class="post-content">
                        <a href="post.php?id=<?= htmlspecialchars($post["id"]) ?>"
                           class="post-title">
                            <?= htmlspecialchars($post["title"]) ?>
                        </a>
                        <p class="post-description"><?= htmlspecialchars($post["description"]) ?></p>
                    </div>
                    <div class="post-footer">
                        <p class="post-date"><?= htmlspecialchars($post["date"]) ?></p>
                        <p class="post-author"><?= htmlspecialchars($post["author"]) ?></p>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="detail-error"> <?= htmlspecialchars($error) ?> </p>
    <?php endif; ?>
</div>
</body>
</html>