<?php
require __DIR__ . '/functions/getFunctions.php';
require_once __DIR__ . '/functions/redirectToError.php';
$categories = getCategories();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $posts = getPosts();
    $title = $_POST['title'];
    $description = $_POST['description'];
    if (empty($title) || empty($description)) {
        redirectToError(400);
    }
    $posts[] = [
        "title" => $_POST['title'],
        "description" => $_POST['description'],
        "categoryId" => $_POST['categoryId'],
        "date" => date("20y-m-d"),
        "author" => "Makar",

    ];
    $id = array_key_last($posts);
    $posts[$id]["id"] = $id;
    file_put_contents(__DIR__ . '/data/posts.json', json_encode($posts, JSON_PRETTY_PRINT, JSON_UNESCAPED_UNICODE));
    header("Location: /post.php?id=$id");
    die();
    // поставить бы у инпутов required и не парится
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
                   maxlength="100"
                   minlength="5">
            <!-- проблема решена -->

            <div class="required">Максимум 100 символов</div>
        </div>

        <div class="form-group">
            <label for="description">Текст поста</label>
            <textarea name="description"
                      id="description"
                      cols="30"
                      rows="10"
                      placeholder="Введите содержание вашего поста..."
                      minlength="5"
            ></textarea>
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <textarea name="author"
                      id="author"
                      placeholder="Введите имя автора..."
                      minlength="3"
            ></textarea>
        </div>

        <button type="submit" class="submit-btn">
            🚀 Опубликовать пост
        </button>
    </form>
</div>

</body>
</html>
