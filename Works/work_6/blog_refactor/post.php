<?php
require_once __DIR__ . "/functions/get.php";
require_once __DIR__ . "/functions/showError.php";
try {
    $postId = $_GET ["id"] ?? null;
    $post = getPost((int)$postId);
    $posts = getPosts();
    if ($post === null || $postId === null || $postId < 0 || $postId > count($posts)) {
        showError("Поста не существует", true);
    }
} catch (exception $e) {

    showError("Ошибка сервера: " . $e->getMessage(), false);
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post</title>
    <link rel="stylesheet" href="/style/style.css"/>
</head>
<body>
<?php require __DIR__ . '/components/header.php'; ?>
<main class="detail-post-container">
    <div class="detail-post-head">
        <h2 class="detail-post-title"><?= htmlspecialchars($post["title"]) ?></h2>
        <p class="detail-post-date"><?= htmlspecialchars($post["date"]) ?></p>
    </div>
    <div class="detail-post-footer">
        <p class="detail-post-description"><?= htmlspecialchars($post["description"]) ?></p>
        <p class="detail-post-author"><?= htmlspecialchars($post["author"]) ?></p>
    </div>
</main>
</body>
</html>