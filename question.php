<?php session_start() ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP課題問題</title>
    </head>
    <body>
        <h1>PHP課題</h1>
        <?php
        $mondaisu = $_POST['mondaisu'];
        if(is_null($mondaisu) || !is_numeric($mondaisu)){
            echo "数字ではない文字が入力されました。数字の1〜10の範囲で値を入力してください";
            exit();    
        }else if($mondaisu<1 || $mondaisu>10){
            echo "1〜10以外の数字が入力されました。数字の1〜10の範囲で値を入力してください";
            exit();
        }

            $url = "./question.json";
            $json = file_get_contents($url);
            $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
            $arr = json_decode($json,true);

            if($arr == NULL){
                echo "エラー：問題文を読み込みませんでした。";
                exit();
            }else{
                $_SESSION["mondaisu"]=$mondaisu;
                for($i=0;$i<$mondaisu;$i++){
                    $number[]=$arr["question"][$i]["number"];
                    $script[]=$arr["question"][$i]["script"];
                    $select1[]=$arr["question"][$i]["select1"];
                    $select2[]=$arr["question"][$i]["select2"];
                    $select3[]=$arr["question"][$i]["select3"];
                    $select4[]=$arr["question"][$i]["select4"];
                    $answer[]=$arr["question"][$i]["answer"];
                }
            }
        
        ?>
        
        <form action="./result.php" method="post">
            <?php
            for($i=0;$i<$mondaisu;$i++){
                echo "<p>第" . $number[$i] . "問</p>";
                echo "<p>" . $script[$i] . "</p>";
                echo "<input type=\"radio\" name=\"qat" . $i . "\" value=\"1\">1:".$select1[$i]."<br>";
                echo "<input type=\"radio\" name=\"qat" . $i . "\" value=\"2\">2:".$select2[$i]."<br>";
                echo "<input type=\"radio\" name=\"qat" . $i . "\" value=\"3\">3:".$select3[$i]."<br>";
                echo "<input type=\"radio\" name=\"qat" . $i . "\" value=\"4\">4:".$select4[$i]."<br>";
                /*echo "<p>答え：" . $answer[$i] . "</p>";*/
                echo "<input type=\"hidden\" name=\"tadashiikotae[]\" value=\"" . $answer[$i]. "\">";
            }
            ?>
            
            <input type="submit" value="送信">
        </form>
    
    </body>
</html>