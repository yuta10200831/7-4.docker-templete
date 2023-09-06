<?php session_start(); ?>

<body>
    <!-- エラーメッセージの表示 -->
    <?php if (isset($_SESSION['error'])): ?>
        <p style="color: red;"><?php echo $_SESSION['error']; ?></p>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <h2>メモを登録</h2>

    <form method="post" action="./store.php">

        <div>
            <label for="title">タイトル
                <input type="text" name="title" placeholder="タイトル">
            </label>
        </div>

        <div>
            <label for="impressions">感想
                <textarea name="impressions" placeholder="感想"></textarea>
            </label>
        </div>

        <button type="submit">登録</button>

    </form>
</body>
