<?php
  include('db_connect.php');
  header("Content-Type: text/html; charset=UTF-8");
  $page = $_GET['page'];
  $field = replace_field($_GET['sort_field']);
  $order = $_GET['sort_order'];
  $offset = ($page - 1)*3;

  $SQL_get_rows = "SELECT COUNT(TaskId) AS numb FROM `tasks`"; // Get the amount of rows in DB
  if ($data = $mysqli->query($SQL_get_rows)) {
    $rows_info = array('numb_rows' => $data->fetch_assoc()['numb']);
  }

  if ($field == 'null') // Initial SELECT query for one page
    $SQL_get = "SELECT * FROM tasks LIMIT 3 OFFSET {$offset}";
  else // SELECT query with sorting for one page
    $SQL_get = "SELECT * FROM tasks ORDER BY {$field} {$order} LIMIT 3 OFFSET {$offset}";

  if ($data = $mysqli->query($SQL_get)) {
    $arr = array();
    array_push($arr,$rows_info);
    while ($res = $data->fetch_assoc()) {
      array_push($arr,$res);
    }
    print_r(json_encode($arr));
  }

  function replace_field($str) // Changing field name to match with the DB ones
  {
    if ($str == 'user name')
      $str = 'UserName';
    if ($str == 'email')
      $str = 'UserEmail';
    if ($str == 'status')
      $str = 'TaskStatus';
    return $str;
  }

  // Closing a database connection
  $mysqli->close();
 ?>
