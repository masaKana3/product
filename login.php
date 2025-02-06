<?php
session_start();

require_once("funcs.php");
$pdo = db_conn();

$error = $_SESSION['error'] ?? null; // セッションからエラーメッセージを取得
unset($_SESSION['error']); // エラーメッセージを一度表示したら削除

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>kidzuki Login</title>
</head>

<header>
    <img src="img/logo_kidzuki.png" alt="logo" class="logo"> 
</header>

<body>
    <?php if ($error): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    <!-- From Uiverse.io by alexruix --> 

<div class="form-box">
    <form method="post" action="login_act.php" class="form">
        <span class="title">Login</span>
        <span class="subtitle">IDとパスワードを<br>入力してください</span>
        <div class="form-container">
            <input type="text" class="input"  name ="lid" placeholder="LoginID">
            <input type="password" class="input" name="lpw" placeholder="Password">
        </div>
        <button id="login-button" type="submit" >Login</button>
    </form>
    <div class="form-section">
    <p>Don't have an account? <a href="signup.php">Sign up</a> </p>
    </div>
</div>
    
</body>
</html>