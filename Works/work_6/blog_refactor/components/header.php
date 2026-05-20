<header>
    <nav class="head">
        <a href="../index.php" class="head_link hover_eff
        <?= basename($_SERVER['SCRIPT_FILENAME']) === "index.php" ? "active" : null ?>"> Главная</a>
        <a href="../posts.php" class="head_link hover_eff
        <?= basename($_SERVER['SCRIPT_FILENAME']) === "posts.php" ? "active" : null ?>"> Статьи</a>
        <a href="../create-post.php" class="head_link hover_eff
        <?= basename($_SERVER['SCRIPT_FILENAME']) === "create-post.php" ? "active" : null ?>"> Создание постов</a>
    </nav>
</header>