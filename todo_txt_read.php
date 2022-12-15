<?php

$str = "";
$array = [];

$file = fopen("data/todo.txt", "r");
flock($file, LOCK_EX);


if ($file){
while($line = fgets($file)){
    $str .= "<tr><td>{$line}</td></tr>";

    // 配列を作る
    // $array[] = [
    //   "deadline" =>explode(" ", $line)[0],
    //   "todo" => str_replace("\n", "",explode(" ", $line)[1]),
      
    // ];
  }
}

//追加分

$results=array(
  "0" => array(
      "日にち"  =>"2022-12-14",
      "やること" =>"お風呂"
      
  )
);

$filename = "userData.csv";
header("Content-type: text/csv");

header("Content-Disposition: attachment; filename=$filename");

$output = fopen("php://output", "w");

$header = array_keys($results[0]);

fputcsv($output, $header);

foreach($results as $row)
{
    fputcsv($output, $row);

}

fclose($output);




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
          <th>deadline</th>
        </tr>
      </thead>
      <tbody>
        <!--タグを表示-->
        <?= $str ?>
      </tbody>
    </table>
  </fieldset>
  <script>
    //JSに値を渡すときはjson_encodeすればおk
    const todos = <?= json_encode($array) ?>;
    console.log(todos);
  </script>

</body>

</html>