<?php
session_start(); // セッション開始
require_once("funcs.php");
$pdo = db_conn();

$error = $_SESSION['error'] ?? null; // セッションからエラーメッセージを取得
unset($_SESSION['error']); // エラーメッセージを一度表示したら削除


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "ログインしてください。<br>";
    echo '<a href="login.php">ログインページへ</a>';
    exit;
}

echo "ようこそ、" . htmlspecialchars($_SESSION['lid']) . " さん！";
echo '<br><a href="logout.php">ログアウト</a>';
?>