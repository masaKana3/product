<?php
session_start();

require_once("funcs.php");
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM family_table");
$stmt->execute();
$families = $stmt->fetchAll(PDO::FETCH_ASSOC);

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
    
    <p>アカウントを作成しました<br>ユーザー登録をいたします</p>
   
    <div class="container">
        <p>下記の質問にお答えください</p>
        <form id="survey-form1" method="post" action="conditions.php">
            <div class="survey">
                <ol type="1">
                    <!-- radio-button -->
                    <li>性別</li>
                        <label><input type="radio" name="gender" value="女性" required>女性</label><br>
                        <label><input type="radio" name="gender" value="男性" required>男性</label><br>
                        <label><input type="radio" name="gender" value="未回答" required>回答したくない</label>
                    <li>生年月日</li>
                        <div class="birthday">
                        <select id="select_year" name="year"></select>年
                        <select id="select_month" name="month"></select>月
                        <select id="select_day" name="day"></select>日
                        <input type="hidden" id="birthdate" name="birthdate">
            </div>
                    <!-- select-button -->
                    <div class="area-box">
                    <li>居住地</li>
                        <select name="area">
                        <option value="選択してください" >--選択してください--</option>
                        <option value="北海道">北海道</option>
                        <option value="青森県">青森県</option>
                        <option value="岩手県">岩手県</option>
                        <option value="宮城県">宮城県</option>
                        <option value="秋田県">秋田県</option>
                        <option value="山形県">山形県</option>
                        <option value="福島県">福島県</option>
                        <option value="茨城県">茨城県</option>
                        <option value="栃木県">栃木県</option>
                        <option value="群馬県">群馬県</option>
                        <option value="埼玉県">埼玉県</option>
                        <option value="千葉県">千葉県</option>
                        <option value="東京都">東京都</option>
                        <option value="神奈川県">神奈川県</option>
                        <option value="新潟県">新潟県</option>
                        <option value="富山県">富山県</option>
                        <option value="石川県">石川県</option>
                        <option value="福井県">福井県</option>
                        <option value="山梨県">山梨県</option>
                        <option value="長野県">長野県</option>
                        <option value="岐阜県">岐阜県</option>
                        <option value="静岡県">静岡県</option>
                        <option value="愛知県">愛知県</option>
                        <option value="三重県">三重県</option>
                        <option value="滋賀県">滋賀県</option>
                        <option value="京都府">京都府</option>
                        <option value="大阪府">大阪府</option>
                        <option value="兵庫県">兵庫県</option>
                        <option value="奈良県">奈良県</option>
                        <option value="和歌山県">和歌山県</option>
                        <option value="鳥取県">鳥取県</option>
                        <option value="島根県">島根県</option>
                        <option value="岡山県">岡山県</option>
                        <option value="広島県">広島県</option>
                        <option value="山口県">山口県</option>
                        <option value="徳島県">徳島県</option>
                        <option value="香川県">香川県</option>
                        <option value="愛媛県">愛媛県</option>
                        <option value="高知県">高知県</option>
                        <option value="福岡県">福岡県</option>
                        <option value="佐賀県">佐賀県</option>
                        <option value="長崎県">長崎県</option>
                        <option value="熊本県">熊本県</option>
                        <option value="大分県">大分県</option>
                        <option value="宮崎県">宮崎県</option>
                        <option value="鹿児島県">鹿児島県</option>
                        <option value="沖縄県">沖縄県</option>
                        </select>
                    </div>
                    <li>職業</li>
                        <select name="job">
                        <option value="選択してください" >--選択してください--</option>
                        <option value="会社員">会社員</option>
                        <option value="公務員">公務員</option>
                        <option value="自営業">経営者・会社役員・個人事業主</option>
                        <option value="パート・アルバイト">パート・アルバイト</option>
                        <option value="主婦・主夫">専業主婦・主夫</option>
                        <option value="その他">その他</option>
                        </select>
                    <li>家族構成</li>
                        <span>同居のご家族を下記からお選びください（複数選択可）</span><br>
                        
                        <?php foreach ($families as $family): ?>
                            <label>
                                <input type="checkbox" name="family[]" value="<?= h($family['family_id']) ?>">
                                <?= h($family['family_name']) ?>
                            </label><br>
                        <?php endforeach; ?>
                </ol>
            </div>
           
            <button id="submit-button" type="submit">次の質問へ</button>
        </form>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>