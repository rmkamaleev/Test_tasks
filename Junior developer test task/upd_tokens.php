<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesheet.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <title>Account data insert</title>
  </head>
  <body>
    <header>
      <h1>Пожалуйста, заполните данные аккаунта:</h1>
    </header>
    <form class="data_fill" id="tok_data" method="post" action="./scripts/update_tokens.php">
      <div class="form-group">
        <label>Секретный ключ</label>
        <input type="text" name="client_secret" class="form-control" required>
      </div>
      <div class="form-group">
        <label>ID интеграции</label>
        <input type="text" name="client_id" class="form-control" required>
      </div>
      <div class="form-group">
        <label>Код авторизации</label>
        <input type="text" name="code" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-dark" id="update_tokens">Обновить токены</button>
    </form>
  </body>
</html>
