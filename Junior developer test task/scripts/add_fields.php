<?php
  // Скрипт для создания всех необходимых пользовательских полей в системе
  $access_token = htmlentities(file_get_contents("../tokens/access_token.txt"));

  $subdomain = 'rmkamaleev';
  $link = 'https://' . $subdomain . '.amocrm.ru/api/v2/fields'; // URL запроса для добавления полей

  $headers = [
    'Authorization: Bearer ' . $access_token, // Добавление токена доступа в заголовки запроса
    'Content-Type: application/json'
  ];

  // Массив всех добавляемых пользовательских полей
  $fields['add'] = array(
   array(
      'name' => "Company",
      'field_type'=> 1,
      'element_type' => 2,
      'origin' => "61903",
      'is_editable' => 1,
   ),
   array(
      'name' => "Oferta",
      'field_type'=> 3,
      'element_type' => 2,
      'origin' => "61903",
      'is_editable' => 1,
   ),
   array(
      'name' => "Имя контакта",
      'field_type'=> 1,
      'element_type' => 2,
      'origin' => "61903",
      'is_editable' => 1,
   ),
   array(
      'name' => "Телефон",
      'field_type'=> 1,
      'element_type' => 2,
      'origin' => "61903",
      'is_editable' => 1,
   ),
   array(
      'name' => "utm_source",
      'field_type'=> 1,
      'element_type' => 2,
      'origin' => "61903",
      'is_editable' => 1,
   ),
   array(
      'name' => "utm_medium",
      'field_type'=> 1,
      'element_type' => 2,
      'origin' => "61903",
      'is_editable' => 1,
   ),
   array(
      'name' => "utm_campaign",
      'field_type'=> 1,
      'element_type' => 2,
      'origin' => "61903",
      'is_editable' => 1,
   ),
   array(
      'name' => "utm_content",
      'field_type'=> 1,
      'element_type' => 2,
      'origin' => "61903",
      'is_editable' => 1,
   ),
   array(
      'name' => "utm_term",
      'field_type'=> 1,
      'element_type' => 2,
      'origin' => "61903",
      'is_editable' => 1,
   ),
   array(
      'name' => "MailAgree",
      'field_type'=> 3,
      'element_type' => 2,
      'origin' => "61903",
      'is_editable' => 1,
   ),
   array(
      'name' => "FormID",
      'field_type'=> 1,
      'element_type' => 2,
      'origin' => "61903",
      'is_editable' => 1,
   )
);

  $json = json_encode($fields, JSON_UNESCAPED_UNICODE);
  $fd = fopen('../data/fields.json', 'w') or die; // Сохранение отправляемых данных в файл
  fwrite($fd,$json);
  fclose($fd);

  $curl = curl_init();
  curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
  curl_setopt($curl,CURLOPT_URL, $link);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
  curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
  curl_setopt($curl,CURLOPT_HEADER, false);
  curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
  curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);
  $out = curl_exec($curl);
  $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  curl_close($curl);

  $code = (int)$code;
  $errors = [
  	400 => 'Bad request',
  	401 => 'Unauthorized',
  	403 => 'Forbidden',
  	404 => 'Not found',
  	500 => 'Internal server error',
  	502 => 'Bad gateway',
  	503 => 'Service unavailable',
  ];

  try
  {
  	if ($code < 200 || $code > 204) {
  		throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undefined error', $code);
  	}
  }
  catch(\Exception $e)
  {
  	die('Ошибка: ' . $e->getMessage() . PHP_EOL . 'Код ошибки: ' . $e->getCode());
  }

  // Возврат на страницу с главной формой
  header('Location: http://localhost/index.php?utm_source=yandex&utm_medium=cpc&utm_campaign=camp&utm_content=Offer25&utm_term=behappy');
?>
