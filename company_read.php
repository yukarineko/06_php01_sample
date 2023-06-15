<?php
//データまとめ用の空文字数
$str="";
$array=[];

//ファイルを開く（読み取り専用）
$file=fopen("data/company.txt","r");
//ファイルをロック
flock($file,LOCK_EX);

//fgets()で１行ずつ取得→$lineに格納
if($file){
    while($line=fgets($file)){
        //取得したデータを`$str`に追加する
        $str .="<tr><td>{$line}</td></tr>";
        array_push($array,$line);
    }
}

//ロックを解除する
flock($file,LOCK_UN);
//ファイルを閉じる
fclose($file);

//var_dump($array);
//exit();

//`$str`に全てのデータ（タグに入った状態）がまとまるので、HTML内の任意の場所に表示される

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>授業申し込みフォーム</title>
</head>

<body>
  <fieldset>
    <legend>companyリスト（入力画面）</legend>
    <a href="company_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>todo</th>
        </tr>
      </thead>
      <tbody>
        <?=$str?>
      </tbody>
    </table>
  </fieldset>
    <script>
        
   const company = <?=json_encode($array)?>;
    console.log(company);
  </script>
</body>

</html>
