<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/stylesheet.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <title>Create task page</title>
  </head>
  <body>
    <header>
      <h1>Please, fill the task card fields</h1>
    </header>
    <div id="message"></div>
    <form id="form" class="data_fill" method="post" action="../add_tasks.php" onsubmit="alert('New task has been added!')">
      <div class="form-group">
        <label for="exampleInputUserName1">Your name</label>
        <input type="text" class="form-control" name="name" value="" required>
      </div>
      <div class="form-group">
        <label for="exampleInputUserName1">Your email</label>
        <input type="email" class="form-control" name="email" value="" id="exampleInputEmail1" aria-describedby="emailHelp" required>
      </div>
      <div class="form-group">
        <label for="exampleInputText1">Your task text</label>
        <textarea type="text" class="form-control" name="task_text" value="" required></textarea>
      </div>
      <button type="submit" class="btn btn-dark">Submit</button>
    </form>
  </body>
</html>
