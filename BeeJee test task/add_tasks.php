<?php
  include('db_connect.php');
  header("Content-Type: text/html; charset=UTF-8");
  $str_s = "/'/"; $str_repl = "`";
  $name = preg_replace($str_s, $str_repl, $_POST['name']);
  $email = preg_replace($str_s, $str_repl, $_POST['email']);
  $task_text = preg_replace($str_s, $str_repl,$_POST['task_text']);

  // Adding new row to the table
  $SQL_add = "INSERT INTO tasks (UserName, UserEmail, TaskText) VALUES ('{$name}', '{$email}', '{$task_text}')";
  if ($mysqli->query($SQL_add) === TRUE) {
    header('Location: http://beje.zzz.com.ua/view/index.php');
  }
  else {
    echo("Error occured in the DB query");
  }

  // Closing a database connection
  $mysqli->close();
 ?>
