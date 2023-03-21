<?php session_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP課題結果</title>
    </head>
    <body>
        <h1>結果</h1>   
        <?php
        for($i=0;$i<$_SESSION["mondaisu"];$i++){
            $kaitou[$i]=$_POST['qat' . $i];
            if(empty($kaitou[$i])){
                echo ($i+1),'問目のラジオボタンのキーが入力されていません。';
                echo "<p><a href=\"./top.php\">TOPページに戻る</a></p>";
                exit();
            }else if(!is_numeric($kaitou[$i])){
                echo "数字ではない文字が入力されました。数字の1〜10の範囲で値を入力してください";
                exit();
            }else if($kaitou[$i]<1 || $kaitou[$i]>4){
                echo "1〜4以外の数字が入力されました。数字の1〜4の範囲で値を入力してください";
                exit();
            }
        }
        ?>
            <table>
            <tr>
                <th>繰り返し構文</th>
                <?php 
                for($i=1;$i <= $_SESSION["mondaisu"]; $i++){
                    echo "<th>" . $i . "</th>";
                } 
                ?>
            </tr>
            <tr>
                <th>回答を繰り返し構文を使って表示・・・①</th>
                <?php 
                for($i=0;$i<$_SESSION["mondaisu"];$i++){
                    echo "<th>" . $kaitou[$i]. "</th>";
                }
                
                ?>
            </tr>
            <tr>
                <th>正解の配列を繰り返し構文を使って表示・・・②</th>
                <?php 
                $tadashiikotae=$_POST['tadashiikotae'];
                for($i=0;$i < $_SESSION["mondaisu"];$i++){
                echo "<th>" . $tadashiikotae[$i] . "</th>";
                } 
                ?>
            </tr>
            <tr>
                <th>①と②を比較して一致していれば◯、不一致であれば×を表示</th>
                <?php 
                $score =0;
                for($i=0;$i<$_SESSION["mondaisu"];$i++){
                    if($tadashiikotae[$i] != $kaitou[$i]){
                        $hantii = "×";
                    }else if($tadashiikotae[$i] == $kaitou[$i]){
                        $hantii = "◯";
                        $score ++;
                    }
                    $seigou[]= $hantii;                
                    echo "<th>" .$seigou[$i]. "</th>";
                } 
                ?>
            </tr>
            </table>
        <?php 
        echo "<p>" .$score. "/" .$_SESSION["mondaisu"]. "</p>";
        $tensu = $score / $_SESSION["mondaisu"];
        if ($tensu >= 0.8){
            echo "<p>合格</p>";
        }else if($tensu < 0.8){
            echo "<p>不合格</p>";
        }
        ?>
        <p><a href="./top.php">TOPページに戻る</a></p>
    </body>
</html>