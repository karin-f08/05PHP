<?php
// var_dump($_POST);
// exit();


$todo = $_POST["todo"];
$deadline = $_POST["deadline"];

$write_data = "{$deadline} {$todo}\n";

$file = fopen("data/todo.txt","a");
flock($file, LOCK_EX);

fwrite($file, $write_data);

flock($file, LOCK_UN);
fclose($file);

header("Location:todo_txt_input.php");

// //追加分
// $filename = "userData.csv";
// header("Content-type: text/csv");

// header("Content-Disposition: attachment; filename=$filename");

// $output = fopen("php://output", "w");

// $header = array_keys($todo);
// $header = array_keys($deadline);

// fputcsv($output, $header);

// foreach($results as $row)
// {
//     fputcsv($output, $row);

// }

// fclose($output);



exit();