<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/stylesheet.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/save_cookies.js"></script>
    <title>Log in page</title>
  </head>
  <body>
    <header>
      <h1>Please, input your login and password:</h1>
    </header>
    <form class="data_fill">
      <div class="form-group">
        <label for="exampleInputLogin1">Login</label>
        <input type="text" name="login" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
      </div>
      <button type="button" class="btn btn-dark" id="submit_admin">Submit</button>
    </form>
  </body>
</html>
