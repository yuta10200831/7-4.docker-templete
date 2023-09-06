<?php
$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:host=mysql; dbname=booksmanagement; charset=utf8',
    $dbUserName,
    $dbPassword
);

$title = $_POST['title'] ?? '';
$impressions = $_POST['impressions'] ?? '';

$error = '';

// タイトルと感想の入力チェック
if ($title === '' || $impressions === '') {
    $error = 'タイトルまたは感想が入力されていません。';
}

if (!$error) {
    // データをDBに保存
    $sql = 'INSERT INTO books (title, impressions, created_at) VALUES (:title, :impressions, NOW())';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':impressions', $impressions);
    $statement->execute();

    // 保存が完了したら、index.phpにリダイレクト
    header('Location: index.php');
    exit;
} else {
    echo $error . '<br>';
    echo '<a href="index.php">トップページへ戻る</a>';
    exit;
}
?>
