$(function () { // Function to check user password and login
  $('#submit_admin').on('click', function() {
    var elems = $('.form-control');
    var login = elems[0].value;
    var password = elems[1].value;
    if (login == 'admin' && password == '123') {
      alert("Verification successfull");
      setCookie('login', login, {'max-age': 3600});
      setCookie('password', password, {'max-age': 3600})
    }
    else
      alert("Incorrect login or password");
    window.location.href = 'http://beje.zzz.com.ua/view/index.php';
  })
})

function setCookie(name, value, options = {}) { // Function to set cookie
  options = {
    path: '/'
  };
  if (options.expires instanceof Date) {
    options.expires = options.expires.toUTCString();
  }
  var updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);
  for (var optionKey in options) {
    updatedCookie += "; " + optionKey;
    var optionValue = options[optionKey];
    if (optionValue !== true) {
      updatedCookie += "=" + optionValue;
    }
  }
  document.cookie = updatedCookie;
}
