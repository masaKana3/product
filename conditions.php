<?php
session_start();

require_once("funcs.php");
$pdo = db_conn();

$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$area = $_POST['area'];
$job = $_POST['job'];
$family_id = $_POST['family_id'];

$error = $_SESSION['error'] ?? null; // セッションからエラーメッセージを取得
unset($_SESSION['error']); // エラーメッセージを一度表示したら削除

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ユーザー登録</title>
    
</head>

<body>
    <h3>ご自身の体調についてお尋ねします</h3>
    <ol>
        <div class="container">
        
        <form id="survey-form" method="post" action="conditions.php">
        <div id="question1">
            <li>ご自身が毎日記録したい項目を下記からお選びください</li>         
                <!-- checkbox -->
                <label><input type="checkbox" name="temperature" value="体温">体温</label><br>
                <label><input type="checkbox" name="weight" value="体重">体重</label><br>
                <label><input type="checkbox" name="blood_pressure" value="血圧">血圧</label><br>
                <label><input type="checkbox" name="sleep_time" value="睡眠時間">睡眠時間</label><br>
                <label><input type="checkbox" name="exercise_time" value="運動時間">運動時間</label><br>
                <label><input type="checkbox" name="meal" value="食事内容">食事内容</label><br>
        </div>
            <li>現在気になる症状はありますか？</li>
            <input type="submit" value="次へ">

        </div>
            
        </form>
    </ol>








</body>