<?php

$dbUserName = 'root';
$dbPassword = 'password';
$pdo = new PDO(
    'mysql:host=mysql; dbname=booksmanagement; charset=utf8',
    $dbUserName,
    $dbPassword
);

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT * FROM books where id = $id";
$statement = $pdo->prepare($sql);
$statement->execute();
$page = $statement->fetch();
?>

<body>
  
  <h2>編集</h2>

  <form method="post" action="./update.php">

    <input type="hidden" name="id" value=<?php echo $page['id']; ?>>

    <div>
      <label for="name">タイトル
        <input type="text" name="title" value=<?php echo $page['title']; ?>>
      </label>
    </div>

    <div>
      <label for="impressions">感想
        <input type="textarea" name="impressions" value=<?php echo $page[
            'impressions'
        ]; ?>>
      </label>
    </div>

    <button type="submit">更新</button>
    
  </form>

</body>