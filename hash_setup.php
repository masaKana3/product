<?php
session_start();
require_once('funcs.php');
$pdo = db_conn();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST['lid'], $_POST['email'], $_POST['lpw'])) {
        $_SESSION['error_message'] = "すべてのフィールドを入力してください";
        header('Location: signup.php');
        exit();
    }

    $lid = trim($_POST['lid']); // ログインID
    $email = trim($_POST['email']); // メールアドレス
    $plain_password = trim($_POST['lpw']); // 平文のパスワード

     // メールアドレスの重複チェック
     try {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users_table WHERE email = :email");
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->fetchColumn();

    if ($count > 0) {
        // すでに登録されている場合、セッションにエラーメッセージを保存して `login.php` へ遷移
        $_SESSION['error_message'] = "このアドレスはすでに登録されています";
        header('Location: login.php');
        exit();
    }

    // パスワードをハッシュ化
    $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

    // データベースに保存
    $stmt = $pdo->prepare("INSERT INTO users_table (lid, lpw, email) VALUES (:lid, :lpw, :email)");
    $stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':lpw', $hashed_password, PDO::PARAM_STR);
    $status = $stmt->execute();

    if ($status) {
        // 登録成功時にセッションにユーザー情報を保存
        $_SESSION['lid'] = $lid;
        $_SESSION['loggedin'] = true;
        header('Location: entry.php');
    }else{
        // 失敗した場合も `login.php` にリダイレクト
        $_SESSION['error_message'] = "登録に失敗しました。";
        header('Location: login.php');
    }
} catch (PDOException $e) {
        // エラー発生時
        $_SESSION['error_message'] = "データベースエラー: " . $e->getMessage();
        header('Location: signup.php');
    }
    exit();
}
?>