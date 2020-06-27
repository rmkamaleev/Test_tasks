<?php
  // Функции для форматирования данных формы с целью отправки запроса к API
  function form_lead($data)
  {
    $first_id = 38929;
    $fields = []; $i = 0;

    $data['Oferta'] = boolval($data['Oferta']);
    $data['MailAgree'] = boolval($data['MailAgree']);

    foreach ($data as $key => $val) { // Обход всего массива значений, полученных из формы
      if ($key != 'name') { // За исключением поля name: оно не является пользовательским
        $temp = array(
          "field_id" => $first_id + $i*2,
          "values" => [
            array(
              "value" => $val
            )
          ]
        );
        array_push($fields, $temp);
        $i++;
      }
    }
    $arr = array(array( // Создание ассоциативного массива с данными сделки
      "name" => $data['name'],
      "custom_fields_values" => $fields
    ));
    return $arr;
  }
 ?>
