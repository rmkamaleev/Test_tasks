$(function() { // Function to change the page view if admin logged in
  if (document.cookie.indexOf('login=admin; password=123') != -1 || document.cookie.indexOf('password=123; login=admin;') != -1) {
    $('title').text('Task list (admin access)');
    $('h1').text('Admin, welcome to the Task Mannager app!');
    $('#login').hide();
    $('#logout').show();
    var elems = $('.btn.btn-info');
    for (var i = 0; i < elems.length; i++) {
      $('#textarea_'+(i+1)).prop("disabled", false);
      $('#checkbox_'+(i+1)).prop("disabled", false);
      $('#submit_'+(i+1)).show();
    }
    checkbox_label_change();
    send_data();
  }
})

function checkbox_label_change() { // Function to handle event of checkbox change
  $('.custom-control-input').click(function() {
    var old = $(this).parent().prev().attr('data-value');
    var new_t = $(this).parent().prev().html();
    var old_status = $(this).attr('value');
    var status = $(this).next().html();
    var new_status = status;
    var second_part = status.split(',')[1] != undefined ? ', ' + status.split(',')[1] : '';
    if ($(this).is(':checked'))
      new_status = 'Completed' + second_part;
    else
      new_status = 'Not completed' + second_part;
    $(this).next().html(new_status);
    enable_submit_button(old,new_t,old_status, new_status, $(this).attr('id'))
  })
}

function textarea_change(obj) { // Function to handle event of textarea change
  var old = obj.getAttribute('data-value');
  var new_t = obj.value;
  var old_status = obj.nextElementSibling.children[0].value;
  var status = obj.nextElementSibling.children[1].innerHTML;
  if(old != new_t) {
    var new_status = status.split(',')[0] + ', Changed by admin';
    obj.nextElementSibling.children[1].innerHTML = new_status;
  }
  else
    obj.nextElementSibling.children[1].innerHTML = status.split(',')[0];

  enable_submit_button(old,new_t,old_status, status, obj.id)
}

function enable_submit_button(old_text,new_text,old_status,new_status,id) { // Function to enable or disable submit button
  id = id.split('_')[1];
  if (old_text != new_text || old_status != new_status) {
    $('#submit_' + id).prop("disabled", false);
  }
  else {
    $('#submit_' + id).prop("disabled", true);
  }
}

function send_data() { // Function to check validation and to update data in DB via AJAX query
  $('.btn.btn-info').click(function() {
    if (document.cookie.indexOf('login=admin; password=123') != -1 || document.cookie.indexOf('password=123; login=admin;') != -1) {
      var curr_elem_numb = $(this).attr('id').split('_')[1]
      var task_status = $(this).prev().find('label').html();
      var task_text = document.getElementById('textarea_' + curr_elem_numb).value;
      var task_id = $('#id_' + curr_elem_numb).attr('value');
      $.ajax({
          type: "post",
          url: "../update_tasks.php",
          data: {id: task_id, text: task_text, status: task_status}
      }).done(function( result )
          {
            alert(result);
            $('#submit_' + curr_elem_numb).prop('disabled',true);
          });
    }
    else {
      alert('Authentication required');
      window.location.reload();
    }
  })
}

function delete_cookies() { // Function to delete all cookies
  var cookies = document.cookie.split(";");
	for (var i = 0; i < cookies.length; i++) {
		var cookie = cookies[i];
		var eqPos = cookie.indexOf("=");
		var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
		document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT;";
		document.cookie = name + '=; path=/; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
	}
  window.location.reload();
}
