<?php
//必ず最初にチェック！内容を確認したらコメントアウトする
//var_dump($_GET);
//exit();

//キー名に送信元ファイルのname属性を指定する
$todo =$_GET["todo"];
$deadline=$_GET["deadline"];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>todo表示画面（GET）</title>
</head>

<body>
  <fieldset>
    <legend>todo表示画面（GET）</legend>
    <table>
      <thead>
        <tr>
          <th>todo</th>
          <th>deadline</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?=$todo?></td>
          <td><?=$deadline?></td>
        </tr>
      </tbody>
    </table>
  </fieldset>
</body>

</html>