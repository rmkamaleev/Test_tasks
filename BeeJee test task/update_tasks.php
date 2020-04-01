<?php
  include('db_connect.php');
  header("Content-Type: text/html; charset=UTF-8");
  $task_id = $_POST['id'];
  $task_text = $_POST['text'];
  $task_status = $_POST['status'];

  // Changing row`s data
  $SQL_Update = "UPDATE `tasks` SET `TaskText` = '{$task_text}', `TaskStatus` = '{$task_status}' WHERE `tasks`.`TaskId` = '{$task_id}'";
  if ($mysqli->query($SQL_Update) === TRUE) {
    echo "Task information has been updated!";
  }
  else {
    echo("Error occured in the DB query");
  }

  // Closing a database connection
  $mysqli->close();
?>
