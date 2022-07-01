<?php

session_start();

require_once('db.php');
require_once('functions.php');

 if (isset($_POST['login_name'])) {
    // 名前の重複チェック
    $login_name = $_POST['login_name'];
    $login_password = $_POST['login_password'];
    // name存在チェック
    $a = getUserByName($login_name);
    if ($a) {
        /* nameが存在した */
        $user = $a[0];
        // パスワードチェック
        if (password_verify($login_password, $user['password_hash'])) {
            /* ログインに成功した */
            // セッションにユーザidを格納する
            $_SESSION['user_id'] = $user['id'];
            $msg = 'ログインに成功しました';
            header('Location: index.php');
            exit;
        }
    }
    /* ログインに失敗した */
    $msg = 'ログインに失敗しました';
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php require_once('head.php'); ?>

<body>
  <div class="container">
    <h1 class="my-5">ログイン</h1>
    <div class="card mb-3">
      <div class="card-body">
        <form method="POST">
          name
          <input class="form-control" type=text name="login_name" value=<?= (isset($login_name) ? $login_name : '') ?>>
          <br>
          password
          <input class="form-control" type=password name="login_password" value=<?= (isset($login_password) ? $login_password : '') ?>>
          <br>
          <input class="btn btn-primary" type=submit value="ログイン">
        </form>
      </div>
    </div>
    <p><?= (isset($msg) ? $msg : '') ?> </p>
    <p><a href="register.php">ユーザー登録をする</a></p>
  </div>
</body>

</html>
