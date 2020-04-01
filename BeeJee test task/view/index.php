<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/load_data_main.js"></script>
    <script src="../js/relocate_page.js"></script>
    <script src="../js/sort_data.js"></script>
    <script src="../js/admin_access.js"></script>
    <link rel="stylesheet" href="/css/stylesheet.css">
    <title>Task list</title>
  </head>
  <body>
    <header>
      <h1>Welcome to the Task Mannager app!</h1>
      <center><div class="ctrl_btns">
        <button type="button" name="create_task" class="btn btn-dark" id="task_cr" onclick="relocate('create_task_page.php')">Create task</button>
        <button type="button" name="login" class="btn btn-dark" id="login" onclick="relocate('login_page.php')">Log in</button>
        <button type="button" name="logout" class="btn btn-dark" id="logout" onclick="delete_cookies()" style="display:none">Log out</button>
      </div></center>
    </header>
    <center><div class="sort_panel">
      Sort by: <span id="us_name" value='user name' data-value="">user name ↓</span> <span id="us_email" value='email' data-value="">email ↓</span> <span id="us_status" value="status" data-value="">status ↓</span>
    </div></center>
    <input type="hidden" name="page_num" id="page" value="">
    <center><div class="all_cards">
      <div class="card bg-light mb-3 task_card" style="max-width: 18rem; display: none">
        <form class="card_form" id="form_1">
          <input type="hidden" id="id_1" name='id' value="">
          <div class="card-header"></div>
          <div class="card-body">
              <h5 class="card-title"></h5>
              <textarea class="form-control" name="card_text" rows="5" cols="80" data-value="" id="textarea_1" disabled onchange="textarea_change(this)"></textarea>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" value="" id="checkbox_1" disabled>
                <label class="custom-control-label" for="checkbox_1">Check this custom checkbox</label>
              </div>
              <button type="button" id="submit_1" name="button" class="btn btn-info" style="display: none" disabled>Apply changes</button>
          </div>
        </form>
      </div>

      <div class="card bg-light mb-3 task_card" style="max-width: 18rem; display: none">
        <form class="card_form" id="form_2">
          <input type="hidden" id="id_2" name='id' value="">
          <div class="card-header"></div>
          <div class="card-body">
              <h5 class="card-title"></h5>
              <textarea class="form-control" name="card_text" rows="5" cols="80" data-value="" id="textarea_2" disabled onchange="textarea_change(this)"></textarea>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" value="" id="checkbox_2" disabled>
                <label class="custom-control-label" for="checkbox_2"></label>
              </div>
              <button type="button" id="submit_2" name="button" class="btn btn-info" style="display: none" disabled>Apply changes</button>
          </div>
        </form>
      </div>

      <div class="card bg-light mb-3 f_card" style="max-width: 18rem; display: none">
        <form class="card_form" id="form_3">
          <input type="hidden" id="id_3" name='id' value="">
          <div class="card-header"></div>
          <div class="card-body">
              <h5 class="card-title"></h5>
              <textarea class="form-control" name="card_text" rows="5" cols="80" data-value="" id="textarea_3" disabled onchange="textarea_change(this)"></textarea>
              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" value="" id="checkbox_3" disabled>
                <label class="custom-control-label" for="checkbox_3"></label>
              </div>
              <button type="button" id="submit_3" name="button" class="btn btn-info" style="display: none" disabled>Apply changes</button>
          </div>
        </form>
      </div>
    </div></center>

    <footer class='footer_numbers'>
      <center><div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group mr-2" role="group" aria-label="First group" id="btn_group"></div>
      </div></center>
    </footer>

  </body>
</html>
