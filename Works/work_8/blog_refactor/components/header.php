<header>
    <nav class="head">
        <a href="../index.php" class="head_link hover_eff
        <?= basename($_SERVER['SCRIPT_FILENAME']) === "index.php" ? "active" : null ?>">Главная</a>
        <a href="../posts.php" class="head_link hover_eff
        <?= basename($_SERVER['SCRIPT_FILENAME']) === "posts.php" ? "active" : null ?>">Статьи</a>
        <a href="../calculator.php" class="head_link hover_eff
        <?= basename($_SERVER['SCRIPT_FILENAME']) === "calculator.php" ? "active" : null ?>">Калькулятор</a>
        <a href="../create-post.php" class="head_link hover_eff
        <?= basename($_SERVER['SCRIPT_FILENAME']) === "create-post.php" ? "active" : null ?>">Создание постов</a>
        <a href="../edit-post.php" class="head_link hover_eff
        <?= basename($_SERVER['SCRIPT_FILENAME']) === "edit-post.php" ? "active" : null ?>">Редактирование постов
            (врем)</a>
    </nav>
</header>