<?php

$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:host=mysql; dbname=booksmanagement; charset=utf8',
    $dbUserName,
    $dbPassword
);

$id = filter_input(INPUT_POST, 'id');
$title = filter_input(INPUT_POST, 'title');
$impressions = filter_input(INPUT_POST, 'impressions');

if (!empty($title) && !empty($impressions)) {
    $sql = 'UPDATE books SET title=:title, impressions=:impressions WHERE id = :id';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->bindValue(':title', $title, PDO::PARAM_STR);
    $statement->bindValue(':impressions', $impressions, PDO::PARAM_STR);
    $statement->execute();

    header('Location: index.php');
    exit();
}
$error = 'タイトルまたは本文が入力されていません';
?>

<body>
  <div>
    <p><?php echo $error . "\n"; ?></p>
    <a href="index.php">
        <p>トップページへ</p>
    </a>
  </div>
</body>
