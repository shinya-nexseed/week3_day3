<?php
    // PHPからDBへの接続
    $db = mysqli_connect('localhost', 'root', 'mysql', 'online_bbs') or die(mysqli_connect_error());
    mysqli_set_charset($db,'utf8');
    // mysqli_connectはPHP5.5系から推奨になった新しい書き方で、
    // よりセキュアなコードです。

    $sql = "SELECT * FROM `post` ORDER BY `created_at` DESC";

    $result = mysqli_query($db,$sql) or die(mysqli_error($db));
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Online BBS</title>
</head>
<body>
  <h1>ひとこと掲示板</h1>

  <form action="bbs.php" method="post">
    名前: <input type="text" name="name"><br>
    ひとこと: <input type="text" name="comment" size="60"><br>
    <input type="submit" name="submit" value="送信">
  </form>

  <ul>
    <?php while ($post = mysqli_fetch_assoc($result)): ?>
    <li><?php echo $post['name']; ?>: <?php echo $post['comment'] ?></li>
    <?php endwhile; ?>
  </ul>
</body>
</html>










