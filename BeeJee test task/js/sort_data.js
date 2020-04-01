$(function() { // Function to enable sorting process of data
  $('.sort_panel span').click(function() {
    var page_num;
    if ($('#page').attr('value') == '')
      page_num = 1;
    else
      page_num = $('#page').attr('value');
    if ($(this).attr('data-value') == '') {
      var elems = $('.sort_panel span');
      for (var i = 0; i < elems.length; i++) {
        if (elems[i].id != $(this).attr('id')) {
          elems[i].style.cssText = "font-weight: 400;  color: #737373;"
          elems[i].innerHTML = elems[i].getAttribute('value') + ' ↓';
          elems[i].setAttribute('data-value','');
        }

      }
      $(this).css('font-weight', '500');
      $(this).css('color', '#212529');
      $(this).attr('data-value','asc');
    }
    else if ($(this).attr('data-value') == "asc") {
      $(this).text($(this).attr('value') + ' ↑');
      $(this).attr('data-value','desc');
    }
    else if ($(this).attr('data-value') == "desc") {
      $(this).text($(this).attr('value') + ' ↓');
      $(this).attr('data-value','asc');
    }
    [sort_field, sort_order] = find_field();
    get_data(page_num,sort_field,sort_order);
  })
})
