<?php
  function get_result($str) // Функция, получающая финальный результат
  {
    $arr_opt = array();
    echo 'Данные из файла: <br>' . $str . '<br>';
    $arr_opt = all_opt_get($str, $arr_opt);
    return $arr_opt;
  }

  function save_first_new($str) // Сохраняет варианты строк с раскрытыми внешними фигурными скобками
  {
    $count = 0; $opt = array();
    for ($i=0; $i < strlen($str); $i++) {
      if ($str[$i] == '{' && $count == 0) { // Первое вхождение скобочного выражения
        $index = $i; $count++;
        $opt = brack_save($str, $i, $opt)[0];
        $i = brack_save($str, $i, $opt)[1];
      }
      if ($str[$i] == '|') { // Переход к следующему скобочному выражению
        $opt = brack_save($str, $i, $opt)[0];
        $i = brack_save($str, $i, $opt)[1] - 1;
      }
      if ($str[$i] == '}' && $str[$i+1] != '}' && $str[$i+1] != '|' && count($opt) > 0) { // Конец считывания
        for ($k=0; $k < count($opt); $k++) { // Присоединение начала строки
          $opt[$k] = substr($str,0,$index) . $opt[$k];
        }
        for ($k=0; $k < count($opt); $k++) { // Присоединение оставшейся части строки
          $opt[$k] = $opt[$k] . substr($str,$i+1);
        }
        break;
      }
    }
    return $opt;
  }

  function brack_save($str, $i, $opt) // Сохранение скобочного выражения вида текст{...}текст
  {
    $temp_str = '';  $j = $i + 1;
    $count_open = 0; $count_close = 0;
    while(!($count_open == $count_close && ($str[$j] == '|' || $str[$j] == '}'))) {
      if ($str[$j] == '{')
        $count_open++;
      if ($str[$j] == '}')
        $count_close++;
      $temp_str = $temp_str . $str[$j];
      $j++;
    }
    array_push($opt,$temp_str);
    $res_arr = array($opt, $j);
    $count_open = 0; $count_close = 0;
    return $res_arr;
  }

  function all_opt_get($str,$final_res) // Получение всех вариантов раскрытия строки
  {
    $temp_arr = save_first_new($str);
    for ($i=0; $i < count($temp_arr); $i++) { // Сохранение конечных вариантов
      if (substr_count($temp_arr[$i],'{') == 0)
        array_push($final_res, $temp_arr[$i]);
    }
    $deep = array(); // Глубина вложенности (число фигурных скобок) для всех частей
    for ($i=0; $i < count($temp_arr); $i++) {
      array_push($deep,substr_count($temp_arr[$i],'{')); // Глубина
      while ($deep[$i] != 0) { // Рекурсивно вызываем функцию, пока не получим все варианты раскрытия строки
        $final_res = all_opt_get($temp_arr[$i],$final_res);
        $deep[$i]--;
      }
    }
    $final_res = array_unique($final_res); // Обеспечение уникальности элементов массива
    return $final_res;
  }
?>
