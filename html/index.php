<?php

session_start();

//ログインしていない場合、login.phpを表示
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once('db.php');
require_once('functions.php');

/**
 * @param String $tweet_textarea
 * つぶやき投稿を行う。
 */
function newtweet($tweet_textarea)
{
    // 汎用ログインチェック処理をルータに作る。早期リターンで
    createTweet($tweet_textarea, $_SESSION['user_id']);
}

/**
 * 返信として投稿する
 */
function newReplyTweet($tweet_textarea, $reply_post_id)
{
    createReplyTweet($tweet_textarea, $reply_post_id, $_SESSION['user_id']);
}

/**
 * ログアウト処理を行う。
 */
function logout()
{
    $_SESSION = [];
    $msg = 'ログアウトしました。';
}

/**
 * 返信元のメッセージリンクの出し分け
 */
function getLinkOriginalTweet(array $t): string
{
    if (isset($t['reply_id'])) {
        $reply_id = $t['reply_id'];
        return "<a href=/view.php?id={$reply_id}>[返信元のメッセージ]</a>";
    }
    return '';
}

function getLinkCreateReply(array $t): string
{
    $tweet_id = $t['id'];
    return "<a href=\"index.php?reply={$tweet_id}\">[返信する]</a>";
}

function getUserName($post_id)
{
    $name = getTweet($post_id)['name'];
    return $name;
}

function getUserReplyText($post_id)
{
    return "Re: @" . getUserName($post_id) . ' ';
}

if ($_POST) { /* POST Requests */
    if (isset($_POST['logout'])) { //ログアウト処理
        logout();
        header("Location: login.php");
    } elseif (isset($_POST['tweet_textarea'])) { //投稿処理
        if (isset($_POST['reply_post_id'])) {
            /* 返信の投稿である */
            newReplyTweet($_POST['tweet_textarea'], $_POST['reply_post_id']);
        } else {
            /* 返信ではない投稿である */
            newtweet($_POST['tweet_textarea']);
        }
        header("Location: index.php");
    }
}

$tweets = getTweets();
$tweet_count = count($tweets);
?>

<!DOCTYPE html>
<html lang="ja">

<?php require_once('head.php'); ?>

<body>
  <div class="container">
    <h1 class="my-5">新規投稿</h1>
    <div class="card mb-3">
      <div class="card-body">
        <form method="POST">
          <textarea class="form-control" type=textarea name="tweet_textarea" ?><?php
            $reply_id = $_GET['reply'] ?? null;
            if ($reply_id) {
                echo getUserReplyText($reply_id);
            }
          ?></textarea>
          <br>
          <input class="btn btn-primary" type=submit value="投稿">
          <?= $reply_id ? "<input type=\"hidden\" name=\"reply_post_id\" value=\"{$reply_id}\" />" : '' ?>
        </form>
      </div>
    </div>
    <h1 class="my-5">コメント一覧</h1>
    <?php foreach ($tweets as $t) { ?>
      <div class="card mb-3">
        <div class="card-body">
          <p class="card-title"><b><?= "{$t['id']}" ?></b> <?= "{$t['name']}" ?> <small><?= "{$t['updated_at']}" ?></small></p>
          <p class="card-text"><?= "{$t['text']}" ?></p>
          <p><?= getLinkCreateReply($t) ?> <?= getLinkOriginalTweet($t) ?></p>
        </div>
      </div>
    <?php } ?>
    <form method="POST">
      <input type="hidden" name="logout" value="dummy">
      <button class="btn btn-primary">ログアウト</button>
    </form>
    <br>
  </div>
</body>

</html>
