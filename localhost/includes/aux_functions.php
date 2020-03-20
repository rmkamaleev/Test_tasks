<?php
  // Вспомогательные функции
  function join_arr($arr, $types=0) // Объединение элементов массива по заданному правилу
  {
    $res_fields = '';
    if ($types == 1) {
      $parse_type = " TEXT NOT NULL DEFAULT 'Не задан', ";
      for ($i=0; $i < count($arr); $i++) {
        $res_fields =  $res_fields . $arr[$i] . $parse_type;
      }
      $res_fields = substr($res_fields, 0, -2);
    }
    if ($types == 2) {
      $parse_type = '(25), ';
      for ($i=0; $i < count($arr); $i++) {
        $res_fields =  $res_fields . $arr[$i] . $parse_type;
      }
      $res_fields = substr($res_fields, 0, -2);
    }
    if ($types == 0) {
      for ($i=0; $i < count($arr); $i++) {
        $res_fields =  $res_fields . $arr[$i] . '\', \'';
      }
      $res_fields = substr($res_fields, 0, -4);
    }
    return $res_fields;
  }

  function refresh($mysqli) // Удаление и создание новой таблицы
  {
    if ($mysqli->query("DROP TABLE `Results`") === TRUE) {
      echo "Таблица удалена\r\n";
    }
    $sql_cr = "CREATE TABLE `Results` (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY)";
    if ($mysqli->query($sql_cr) === TRUE) {
      echo("Таблица успешно создана\n");
    }
  }
?>
