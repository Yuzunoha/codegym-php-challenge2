<?php
require_once('db.php');
require_once('functions.php');
$t = getTweet($_GET['id']);
?>

<!DOCTYPE html>
<html lang="ja">

<?php require_once('head.php'); ?>

<body>
  <div class="container">
    <h1 class="my-5">投稿表示</h1>

    <p><a href="index.php">&lt;&lt; 掲示板に戻る</a></p>

    <div class="card mb-3">
      <div class="card-body">
        <!-- 返信課題はここからのコードを修正しましょう。 -->
          <p class="card-title"><b><?= "{$t['id']}" ?></b> <small><?= "{$t['name']}" ?> <?= "{$t['updated_at']}" ?></small></p>
          <p class="card-text"><?= "{$t['text']}" ?></p>
        <!-- 返信課題はここまでのコードを修正しましょう。 -->
      </div>
    </div>
    <br>
  </div>
</body>

</html>
