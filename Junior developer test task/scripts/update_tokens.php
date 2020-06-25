<?php
  // Скрипт для авторизации пользователя
  $subdomain = 'rmkamaleev';
  $link = 'https://' . $subdomain . '.amocrm.ru/oauth2/access_token'; // URL запроса на получение токена доступа

  $data = [ // Данные аккаунта, заполенные в отдельной форме
    'client_id' => $_POST['client_id'],
    'client_secret' => $_POST['client_secret'],
    'grant_type' => 'authorization_code',
    'code' => $_POST['code'],
    'redirect_uri' => 'http://testcrm.zzz.com.ua/'
  ];

  $curl = curl_init();
  curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
  curl_setopt($curl,CURLOPT_URL, $link);
  curl_setopt($curl,CURLOPT_HTTPHEADER,['Content-Type:application/json']);
  curl_setopt($curl,CURLOPT_HEADER, false);
  curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
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

  $response = json_decode($out, true);

  $access_token = $response['access_token']; // Access токен
  $refresh_token = $response['refresh_token']; // Refresh токен

  // Запись токенов в отдельные файлы
  $fd = fopen("../tokens/access_token.txt", 'w') or die("не удалось создать файл");
  fwrite($fd, $access_token);
  fclose($fd);

  $fd = fopen("../tokens/refresh_token.txt", 'w') or die("не удалось создать файл");
  fwrite($fd, $refresh_token);
  fclose($fd);

  $token_type = $response['token_type']; // Тип токена
  $expires_in = $response['expires_in']; // Через сколько действие токена истекает

  // Возврат на страницу с главной формой
  header('Location: http://localhost/index.php?utm_source=yandex&utm_medium=cpc&utm_campaign=camp&utm_content=Offer25&utm_term=behappy');
?>
