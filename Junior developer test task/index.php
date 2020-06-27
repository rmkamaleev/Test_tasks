<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesheet.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="./js/utm_fill.js"></script>
    <title>Form data insert</title>
  </head>
  <body>
    <header>
      <h1>Пожалуйста, заполните данные формы:</h1>
    </header>
    <form class="data_fill" id="formID" method="post" action="./scripts/add_leads.php">
      <button type="button" class="btn btn-dark" id="update_tokens" onclick="window.location.href = 'http://localhost/upd_tokens.php'">Обновить токены</button>
      <div class="form-group">
        <label>Название сделки</label>
        <input type="text" name="name" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Компания</label>
        <input type="text" name="Company" class="form-control" required>
      </div>
      <div class="custom-control custom-checkbox mb-3">
        <input name='Oferta' type='hidden' value='0'>
        <input type="checkbox" class="custom-control-input" name="Oferta" value="1" id="Oferta">
        <label class="custom-control-label" for="Oferta">Согласие с правилами оферты</label>
      </div>
      <div class="form-group">
        <label>Имя контакта</label>
        <input type="text" name="Имя контакта" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Телефон</label>
        <input type="text" name="Телефон" class="form-control" required>
      </div>
      <div class="form-group">
        <label>utm_source</label>
        <input type="text" name="utm_source" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>utm_medium</label>
        <input type="text" name="utm_medium" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>utm_campaign</label>
        <input type="text" name="utm_campaign" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>utm_content</label>
        <input type="text" name="utm_content" class="form-control" readonly>
      </div>
      <div class="form-group">
        <label>utm_term</label>
        <input type="text" name="utm_term" class="form-control" readonly>
      </div>
      <div class="custom-control custom-checkbox mb-3">
        <input name='MailAgree' type='hidden' value='0'>
        <input type="checkbox" class="custom-control-input" name="MailAgree" value="1" id="MailAgree">
        <label class="custom-control-label" for="MailAgree">Согласие на получение писем</label>
      </div>
      <div class="form-group">
        <label>Идентификатор формы</label>
        <input type="text" name="FormID" class="form-control" id="FormID" required>
      </div>
      <button type="submit" class="btn btn-dark" id="submit_form">Отправить</button>
    </form>
  </body>
</html>
