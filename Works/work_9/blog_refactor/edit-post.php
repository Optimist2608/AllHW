<?php
require __DIR__ . '/vendor/autoload.php';

try {
    $categories = getCategories();
    $posts = getPosts();
    $id = $_GET["id"];
    if (!is_numeric($id)) {
        redirectToError();
    }
    $currentPost = getPost($id, true);
    $currentCategoryId = $currentPost["post"]["categoryId"];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $categoryId = (int)$_POST["categoryId"];
        $title = $_POST["title"];
        $description = $_POST["description"];
        $date = $_POST["date"];
        $author = $_POST["author"];

        if ($categoryId < 0 || $categoryId >= count($categories)) {
            redirectToError(400);
        }
        if (validateString($title, 5)) {
            redirectToError(400);
        }
        if (validateString($description, 15)) {
            redirectToError(400);
        }
        if (validateString($author, 3)) {
            redirectToError(400);
        }

        unset($currentPost["post"]);
        $posts[$currentPost["index"]] = [
            "id" => $id,
            "categoryId" => $categoryId,
            "title" => $title,
            "description" => $description,
            "date" => $date,
            "author" => $author
        ];
        putArrayToJSON($posts, "posts");
        header("Location: /post.php?id=$id");
        die();
    }
    $optionChangeStatus = static function (string|int $categoryId) use ($currentCategoryId): string {
        return (int)$categoryId === (int)$currentCategoryId ? "selected" : "";
    };
} catch (exception $e) {
    redirectToError();
}


?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style/style.css"/>
    <link rel="stylesheet" href="/style/create-post.css"/>
    <title>Редактирование поста</title>
</head>
<body>

<?php require __DIR__ . '/components/header.php'; ?>

<div class="create-post-container">
    <div class="form-header">
        <h2>✏️ Редактирование поста</h2>
    </div>

    <form action="" method="post" class="create-post-form">
        <div class="form-group">
            <label for="categoryId">Категория</label>
            <select name="categoryId" id="categoryId" required>
                <option value="" disabled selected>-- Выберите категорию --</option>
                <?php foreach ($categories as $category): ?>
                    <option <?= htmlspecialchars($optionChangeStatus($category["id"])) ?>
                            value="<?= htmlspecialchars($category["id"]) ?>"><?= htmlspecialchars($category["title"]) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="title">Название поста</label>
            <input type="text"
                   placeholder="Введите заголовок поста..."
                   name="title"
                   id="title"
                   maxlength="100"
                   minlength="5"
                   value="<?= htmlspecialchars($currentPost["post"]["title"]) ?>"
                   required>
        </div>

        <div class="form-group">
            <label for="description">Текст поста</label>
            <textarea name="description"
                      id="description"
                      cols="30"
                      rows="10"
                      placeholder="Введите содержание вашего поста..."
                      minlength="5"
                      required><?= htmlspecialchars($currentPost["post"]["description"]) ?></textarea>
        </div>

        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text"
                   name="author"
                   id="author"
                   placeholder="Введите имя автора..."
                   minlength="2"
                   value="<?= htmlspecialchars($currentPost["post"]["author"]) ?>">
        </div>

        <div class="form-group">
            <label for="date">Дата публикации</label>
            <input type="text"
                   name="date"
                   id="date"
                   value="<?= htmlspecialchars($currentPost["post"]["date"]) ?>"
                   readonly>
        </div>

        <div style="display: flex;justify-content: space-between; align-items: center; gap: 15px; margin-top: 10px;">
            <button type="submit" class="submit-btn">
                💾 Сохранить изменения
            </button>
            <a href="./posts.php" class="delete-post-btn">Отмена</a>
        </div>
    </form>
</div>

</body>
</html>