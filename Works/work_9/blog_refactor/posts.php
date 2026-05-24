<?php
require __DIR__ . '/vendor/autoload.php';


try {
    $posts = getPosts();
    $categories = getCategories();
    $currentCategorySlug = $_GET["category"] ?? null;
    $currentCategoryId = findIdBySlug($currentCategorySlug);
    $deletePostCash = getDeletePostCache();

    if (!empty($deletePostCash)) {
        foreach ($deletePostCash as $postId) {
            foreach ($posts as $key => $post) {
                if ((int)$post["id"] === (int)$postId["id"]) {
                    unset($posts[$key]);
                    break;
                }
            }
        }
        $posts = array_values($posts);
        putArrayToJSON($posts, "posts");
        putArrayToJSON([], "deletePostsCache");
    }

    uasort($posts, function ($item1, $item2) {
        return $item2["id"] <=> $item1["id"];
    });

    if (isset($_GET['ajax'])) {
        deletePostsCache();
    }


} catch (Exception $e) {
    redirectToError(500);
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
    <?php foreach ($categories as $category) : ?>
        <div class="category">
            <a class="category" href="posts.php?category=<?= htmlspecialchars($category["slug"]) ?>"
               title="<?= htmlspecialchars($category["description"]) ?>">
                <?= htmlspecialchars($category["title"]) ?>
            </a>
        </div>
    <?php endforeach; ?>
</div>

<div class="posts-container">
    <?php foreach ($posts as $post) : ?>
        <?php if ((int)$post["categoryId"] === (int)$currentCategoryId || $currentCategoryId === null) : ?>
            <div class="post">
                <div class="post-content">
                    <a href="post.php?id=<?= htmlspecialchars($post["id"]) ?>" class="post-title">
                        <?= htmlspecialchars($post["title"]) ?>
                    </a>
                    <p class="post-description"><?= htmlspecialchars($post["description"]) ?></p>
                </div>
                <div class="post-footer">
                    <p class="post-date"><?= htmlspecialchars($post["date"]) ?></p>
                    <p class="post-author"><?= htmlspecialchars($post["author"]) ?></p>
                    <div class="post-actions">
                        <a href="edit-post.php?id=<?= htmlspecialchars($post["id"]) ?>" class="edit-post-btn">
                            Редактировать
                        </a>
                        <button class="delete-post-btn"
                                data-post-id="<?= htmlspecialchars($post["id"]) ?>"
                                data-post-title="<?= htmlspecialchars($post["title"]) ?>">
                            Удалить
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

    <div id="deleteModal" class="delete-modal">
        <div class="delete-modal-content">
            <div class="delete-modal-warning">⚠️</div>
            <h3>Удаление поста</h3>
            <p>Вы действительно хотите удалить этот пост?</p>
            <div id="deleteModalPostTitle" class="delete-modal-post-title"></div>
            <p style="font-size: 12px; color: #fbbf24;">Это действие невозможно отменить!</p>
            <div class="delete-modal-actions">
                <button class="delete-modal-cancel" onclick="closeDeleteModal()">Отмена</button>
                <button class="delete-modal-confirm" onclick="confirmDelete()">Да, удалить</button>
            </div>
        </div>
    </div>
</div>

<script>
    const modal = document.getElementById('deleteModal');
    const deleteModalPostTitle = document.getElementById('deleteModalPostTitle');
    let currentPostId = null;

    function openDeleteModal(postId, postTitle) {
        currentPostId = postId;
        deleteModalPostTitle.textContent = postTitle;
        modal.classList.add('active');
    }

    function closeDeleteModal() {
        modal.classList.remove('active');
        currentPostId = null;
    }

    async function confirmDelete() {
        if (currentPostId === null) return;
        try {
            const response = await fetch("./posts.php?ajax", {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({id: currentPostId})
            });
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            location.reload();
        } catch (e) {
            console.error('Ошибка:', e);
            alert('Ошибка при удалении поста');
        }
    }

    document.querySelectorAll('.delete-post-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            openDeleteModal(this.dataset.postId, this.dataset.postTitle);
        });
    });

    modal.addEventListener('click', function (e) {
        if (e.target === modal) closeDeleteModal();
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && modal.classList.contains('active')) closeDeleteModal();
    });
</script>
</body>
</html>