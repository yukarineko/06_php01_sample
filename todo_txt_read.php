<?php

//データまとめ用の空文字数
$str = "";

//ファイルを開く（読み取り専用）
$file=fopen("data/todo.txt","r");
//ファイルをロック
flock($file,LOCK_EX);

//fgets()で１行ずつ取得→$lineに格納
if($file){
  while($line=fgets($file)){
    //取得したデータを"$str"に追加する
    $str .="<tr><td>{$line}</td></tr>";
  }
}

//ロックを解除する
flock($file,LOCK_UN);
//ファイルを閉じる
fclose($file);

//"$str"に全てのデータ（タグに入った状態）がまとまるので、HTMl内の任意の場所に表示する
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>textファイル書き込み型todoリスト（一覧画面）</title>
</head>

<body>
  <fieldset>
    <legend>textファイル書き込み型todoリスト（一覧画面）</legend>
    <a href="todo_txt_input.php">入力画面</a>
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
</body>

</html>