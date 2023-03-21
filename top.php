<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP課題入力フォーム</title>
        <link rel="stylesheet" href="CSS/top.css">
        <style>
        body{
            background-color: white;
        }
        </style>
    </head>
    <body>
        <h1>PHP課題</h1>
        <h2>フォーム入力</h2>
        <p>問題を10問出します</p>
        <p>回答する数を1〜10の数字を入力して「送信」ボタンを押してください。</p>
        <form action="./question.php" method="post">
            <input type="text" name="mondaisu" placeholder="[1-9]|10">
            <input type="submit" value="送信">
        </form>
    </body>
</html>

