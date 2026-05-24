<?php
require __DIR__ . '/vendor/autoload.php';

try {
    $categories = getCategories();
} catch (Exception $e) {
    redirectToError(500);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    savePost();
    // поставить бы у инпутов required и не парится c валидацией
    // как же хочется убрать все файлы php из главной папки глаза режут очень сильно, от React и его модулей не могу отойти
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style/style.css"/>
    <link rel="stylesheet" href="/style/create-post.css"/>
    <title>Create Post</title>
</head>
<body>
<?php require __DIR__ . '/components/header.php'; ?>

<div class="create-post-container">
    <div class="form-header">
        <h2>✍️ Создание нового поста</h2>
    </div>

    <form action="" method="post" class="create-post-form">
        <div class="form-group">
            <label for="categoryId">Категория</label>
            <select name="categoryId" id="categoryId" required>
                <option value="" disabled selected>-- Выберите категорию --</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= $category["id"] ?>"><?= htmlspecialchars($category["title"]) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="title">Название поста</label>
            <input type="text"
                   placeholder="Введите заголовок поста..."
                   name="title"
                   id="title"

            <!-- проблема решена -->

            <div class="required">Минимум 5 символов</div>
        </div>

        <div class="form-group">
            <label for="description">Текст поста</label>
            <textarea name="description"
                      id="description"
                      cols="30"
                      rows="10"
                      placeholder="Введите содержание вашего поста..."

            ></textarea>
            <div class="required">Минимум 15 символов</div>
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <textarea name="author"
                      id="author"
                      placeholder="Введите имя автора..."
                      minlength="3"
            ></textarea>
            <div class="required">Минимум 3 символа</div>
        </div>

        <button type="submit" class="submit-btn">
            🚀 Опубликовать пост
        </button>
    </form>
</div>

</body>
</html>
