$(function () { // Initial loading of the page
  get_data(1,'null','null');
})

function get_data(page, sort_f, sort_o){ // AJAX query to get data from DB
    $.ajax({
        type: "get",
        url: "../load_tasks.php",
        data: {page: page, sort_field: sort_f, sort_order: sort_o}
    }).done(function( result )
        {
          d_parsed = JSON.parse(result);
          create_buttons(d_parsed[0].numb_rows);
          light_up(page);
          var new_data = d_parsed.slice(1);
          var new_elem = [];  var cards = $('.card');
          for (var i = 0; i < 3; i++) {
            if (i > new_data.length - 1) {
              $('.card:eq('+ i + ')').hide();
            }
            else {
              $('.card:eq('+ i + ')').show();
              cards[i].children[0].children[0].value = new_data[i].TaskId;
              cards[i].children[0].children[1].innerHTML = new_data[i].UserName;
              cards[i].children[0].children[2].children[0].innerHTML = new_data[i].UserEmail
              cards[i].children[0].children[2].children[1].setAttribute('data-value',new_data[i].TaskText);
              cards[i].children[0].children[2].children[1].innerHTML = new_data[i].TaskText;
              $('.custom-control-input')[i].value = new_data[i].TaskStatus;
              $('.custom-control-label')[i].innerHTML = new_data[i].TaskStatus;
            }
          }
          correct_checkes();
        });
}

function create_buttons(amount) { // Function to create page number buttons
  var amount = Math.ceil(amount/3);
  var btn_gr = document.getElementById('btn_group');
  var cur_len = $(".page_btns").length;
  [sort_field, sort_order] = find_field();
  for (var i = cur_len; i < amount-cur_len; i++) {
    var btn = document.createElement('button');
    btn.setAttribute('id',i+1);
    btn.setAttribute('type','button');
    btn.setAttribute('class','btn btn-dark page_btns');
    btn.setAttribute('onclick','get_data(this.innerHTML,sort_field,sort_order); $("#page").attr("value",this.innerHTML);');
    btn.innerHTML = i+1;
    btn_gr.appendChild(btn);
  }
}


function find_field() { // Function to find sort field name and sort order
  var res_arr = [];
  var elems = $('.sort_panel span');
  for (var i = 0; i < elems.length; i++) {
    if (elems[i].getAttribute('data-value') != "")
      res_arr.push(elems[i].getAttribute('value'), elems[i].getAttribute('data-value'));
  }
  if (res_arr.length == 0)
    res_arr.push('null','null');
  return res_arr;
}

function light_up(id) { // Function to light up current page button
  var all_btns = $('#btn_group button');
  $('#'+ id).removeClass('btn btn-dark page_btns').addClass("btn btn-light page_btns");
  for (var i = 1; i <= all_btns.length; i++) {
    if (i != id) {
      $('#'+ i).removeClass('btn btn-light page_btns').addClass("btn btn-dark page_btns")
    }
  }
}

function correct_checkes() { // Function to discard the results of unsaved changes when user wants to sort data or change the page
  var elems = $('.custom-control-input');
  for (var i = 0; i < elems.length; i++) {
    var left_part = elems[i].value.split(',')[0] != undefined ? elems[i].value.split(',')[0] : elems[i].value;
    document.getElementById('textarea_'+(i+1)).value = $('#textarea_'+(i+1)).attr('data-value');
    $('#submit_'+(i+1)).prop('disabled',true);
    if (left_part == "Not completed") {
      $('#checkbox_' + (i+1)).prop('checked',false);
    }
    else if (left_part == "Completed") {
      $('#checkbox_' + (i+1)).prop('checked',true);
    }
  }
}
