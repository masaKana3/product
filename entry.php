<?php
session_start();
require_once('funcs.php');
$pdo = db_conn();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>登録ベージ</title>
</head>