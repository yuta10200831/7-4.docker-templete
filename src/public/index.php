<?php

$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:host=mysql; dbname=booksmanagement; charset=utf8',
    $dbUserName,
    $dbPassword
);

$sql = 'SELECT * FROM books';
$statement = $pdo->prepare($sql);
$statement->execute();
$pages = $statement->fetchAll(PDO::FETCH_ASSOC);

$standard_key_array = [];

foreach ($pages as $key => $value) {
    $standard_key_array[$key] = $value['created_at'];
}

array_multisort($standard_key_array, SORT_DESC, $pages);
?>

<body>
    <a href="create.php">書籍の追加</a><br>

  <div>
    <table border="1">
      <tr>
        <th>タイトル</th>
        <th>感想</th>
        <th>作成日時</th>
        <th>編集</th>
        <th>削除</th>
      </tr>

      <?php foreach ($pages as $page): ?>
        <tr>
          <td><?php echo $page['title']; ?></td>
          <td><?php echo $page['impressions']; ?></td>
          <!-- 表示変更 -->
          <td><?php echo date('Y年m月d日H時i分s秒', strtotime($page['created_at'])); ?></td>
          <td><a href="edit.php?id=<?php echo $page['id']; ?>">編集</a></td>
          <td><a href="delete.php?id=<?php echo $page['id']; ?>">削除</a></td>
        </tr>
      <?php endforeach; ?>

    </table>
  </div>

</body>