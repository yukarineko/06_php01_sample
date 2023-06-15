<?php
//まずはvar_dump($_POST);で値を確認！！
//var_dump($_POST);
//exit();

//データの受け取り
$name=$_POST["name"];
$place=$_POST["place"];
$email=$_POST["email"];
$grade = $_POST["grade"];
$teach = $_POST["teach"];
$kind = $_POST["kind"];
$kind2 = $_POST["kind2"];
$detail=$_POST["detail"];

//データ１件を１行にまとめる（最後に改行をいれる）
$write_data = "{$name}{$place}{$email}{$grade}{$teach}{$kind}{$kind2}{$detail}\n";

//ファイルを開く、引数が"a"である
$file=fopen("data/company.txt","a");
//ファイルをロックする
flock($file,LOCK_EX);

//指定したファイルに指定したデータを書き込む
fwrite($file,$write_data);
//fwrite($file, $write_data);

//ファイルのロックを解除する
flock($file,LOCK_UN);
//ファイルを閉じる
fclose($file);

//データ入力画面に移動する
header("Location:company_input.php");
//header("Location: company_input.php");
exit();
?>