<?php

require_once('db.php');
require_once('functions.php');

if (isset($_POST['register_name'])) {
    // 名前の重複チェック
    $register_name = $_POST['register_name'];
    $register_password = $_POST['register_password'];
    if (getUserByName($register_name)) {
        $msg = "name $register_name は既に使われています。";
    } else {
        $password_hash = password_hash($register_password, null);
        $result = createUser($register_name, $password_hash);
    
        if ($result) {
            $msg = "name $register_name を新規登録しました。";
            $register_name = "";
            $register_password = "";
        } else {
            $msg = "新規登録に失敗しました。";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php require_once('head.php'); ?>

<body>
  <div class="container">
    <h1 class="my-5">新規登録</h1>
    <div class="card mb-3">
      <div class="card-body">
        <form action="register.php" method="POST">
          name
          <input class="form-control" type=text name="register_name" value=<?= (isset($register_name) ? $register_name : '') ?>>
          <br>
          password
          <input class="form-control" type=password name="register_password" value=<?= (isset($register_password) ? $register_password : '') ?>>
          <br>
          <input class="btn btn-primary" type=submit value="新規登録">
        </form>
      </div>
    </div>
    <p><?= (isset($msg) ? $msg : '') ?> </p>
    <p><a href="login.php">ログイン画面に戻る</a></p>
  </div>
</body>

</html>
