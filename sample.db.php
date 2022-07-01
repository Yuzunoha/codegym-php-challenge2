<?php
/**
 * @return string PDO接続文字列
 * PDO接続文字列を取得します。
 */
function getPdo()
{
    return new PDO('mysql:host=db;dbname=bbs', 'root', '{{MYSQL_ROOT_PASSWORD}}');
}
