<?php
require __DIR__ . '/functions/get.php';
$categories = getCategories();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    var_dump($_POST);
    $posts = getPosts();

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
    <title>Create Post</title>
</head>
<body>
<?php require __DIR__ . '/components/header.php'; ?>
<h2>Create post</h2>
<form action="" method="post">
    <p>Категория</p>
    <select name="categoryId" id="">
        <?php foreach ($categories as $category) : ?>
            <option value="<?= $category["id"] ?>"><?= $category["title"] ?></option>
        <?php endforeach; ?>
    </select>
    <p>Имя</p>
    <input type="text" placeholder="title" name="title"><br>
    <p>Текст</p>
    <textarea name="description" cols="30" rows="10"></textarea><br>
    <button type="submit">Create</button>
</form>
</body>
</html>
