<?php
require_once('db.php');
require_once('functions.php');

/* 返信課題はここからのコードを修正しましょう。 */

/* 返信課題はここまでのコードを修正しましょう。 */
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
          <p class="card-title"><b>2</b> <small>nagata1 YYYY-MM-DD hh:mm:ss</small></p>
          <p class="card-text">投稿2つ目</p>
          <?php print_r(getTweet(2)); ?>
        <!-- 返信課題はここまでのコードを修正しましょう。 -->
      </div>
    </div>
    <br>
  </div>
</body>

</html>
