<?php
session_start();
$error_message = $_SESSION['error_message'] ?? '';
unset($_SESSION['error_message']); // エラーメッセージをクリア
?>

<?php if ($error_message): ?>
    <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
<?php endif; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>kidzuki Signup</title>
</head>

<body>
    <!-- From Uiverse.io by alexruix --> 
<img src="img/logo_kidzuki.png" alt="logo" class="logo"> 
<div class="form-box">
    <form class="form" method="post" action="hash_setup.php">
        <span class="title">Sign up</span>
        <span class="subtitle">アカウントを作成します</span>
        <div class="form-container">
            <input type="text" name="lid" class="input" placeholder="UserID" required>
            <input type="email" name="email" class="input" placeholder="Email" required>
            <input type="password" name="lpw" class="input" placeholder="Password" required>
        </div>
        <button id="submit" type="submit">Sign up</button>
    </form>
    <div class="form-section">
    <p>Have an account? <a href="login.php">Log in</a> </p>
    </div>
</div>
    
</body>
</html>