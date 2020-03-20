<?php
  // Подключение файлов с алгоритмом разбиения строки и вспомогательными функциям
  include('includes/algorithm.php');
  include('includes/aux_functions.php');

  // Чтение данных из файла и получение результата разбиения строки
  $data = htmlentities(file_get_contents("user_data/input_data.txt"));
  $res_arr = get_result($data);

  // Подключение к базе данных
  $mysqli = new mysqli('127.0.0.1','root','','test_task_db');
  if ($mysqli->connect_errno) {
    echo "Database access denied<br>";
    echo $mysqli->connect_error;
    exit();
  }

  // Обнуление базы данных
  //refresh($mysqli);

  // Результаты обработки входных данных
  $options = array();
  $amount = count($res_arr);
  for ($i=0; $i < $amount; $i++) { // Задание массива имен столбцов
    array_push($options,'opt'. ($i+1));
  }

  $values = array();
  foreach ($res_arr as $key => $value) { // Задание массива данных (строка результата)
    array_push($values,$value);
  }

  // Оработка данных для сохранения в БД
  $res_fields = implode(', ', $options);
  $res_unique = join_arr($options,2);
  $new_fields = join_arr($options,1);
  $res_values = join_arr($values);

  // Получение количества столбцов без учета id
  $numb_fields = 0;
  $sql_get = "SELECT * FROM `Results`";
  if ($res = $mysqli->query($sql_get)) {
    $numb_fields = $res->field_count - 1;
  }

  // Проверка, совпадает ли количество столбцов в результате с числом текущих столбцов таблицы
  if (count($options) > $numb_fields){ // Если в текущей таблице меньше столбцов, чем в результате
    $new_options = array();
    for ($i=0; $i < count($options); $i++) {
      if ($i > $numb_fields - 1)
        array_push($new_options,$options[$i]); // Массив отличающихся значений
    }
    $new_fields = join_arr($new_options, 1); // Добавление уникальных столбцов
  }
  else {
    $new_fields = join_arr($options, 1); // Добавлять новые столбцы не нужно
  }

  // Добавление новых столбцов в таблицу
  $sql_ch = "ALTER TABLE `Results` ADD ({$new_fields})";
  if ($mysqli->query($sql_ch) === TRUE) {
    //echo("Таблица успешно обновлена\n");
  }

  // Добавление ограничений на уникальность столбцов
  $sql_un = "ALTER TABLE `Results` ADD UNIQUE ({$res_unique})";
  if ($mysqli->query($sql_un) === TRUE) {
    //echo("Столбцы таблицы уникальны\n");
  }

  // Сохранение результата работы программы в таблицу (добавление новых строк)
  $sql_insert = "INSERT INTO `Results` ({$res_fields}) VALUES ('{$res_values}')";
  if ($mysqli->query($sql_insert) === TRUE) {
    echo("В таблицу были добавлены записи.\n");
  }

  // Закрытие соединения с БД
  $mysqli->close();
?>
