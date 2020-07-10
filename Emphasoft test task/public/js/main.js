// Файл с основными функциями для отображения данных пользователя ВК через API
$(set_info())

// Функция отображающая основную информацию на странице в зависимости от того, авторизован ли пользователь
function set_info() {
  let hash = document.location.hash;
  let access_token = hash.split('&')[0].split('=')[1];
  if (access_token != '' && access_token != undefined)
    set_cookie('access_token', access_token);

  if (get_cookie('access_token') == undefined) {
    document.getElementById('head').innerHTML = "Пожалуйста, авторизуйтесь в своем аккаунте ВК";
    document.getElementById('auth_btn').style = "display: block";
  }
  else {
    let us_name = document.getElementById('user_name');
    let friends = document.getElementById('friends')
    document.getElementById('head').innerHTML = "Авторизация успешна";
    access_token = get_cookie('access_token');
    set_params(us_name, friends, access_token);

    us_name.style = "display: block"; friends.style = "display: block";
  }
}

// Функция для получения имени пользователя и его друзей
function set_params(us_name, friends, acc_token) {
  let url_1 = "https://api.vk.com/method/users.get?v=5.52&access_token=" + acc_token;
  let url_2 = "https://api.vk.com/method/friends.get?v=5.52&access_token=" + acc_token + "&count=5&fields=first_name"

  $.ajax({ // AJAX запрос для получения имени авторизованного пользователя
    url: url_1,
    method: "GET",
    dataType: "JSONP",
    success: function (res) {
      us_name.innerHTML += res.response[0].first_name + ' ' + res.response[0].last_name;
    }
  })

  $.ajax({ // AJAX запрос для получения имён пяти друзей пользователя
    url: url_2,
    method: "GET",
    dataType: "JSONP",
    success: function (res) {
      let list_friends = [];
      for (let people of res.response.items)
        list_friends.push(people.first_name + ' ' + people.last_name);
      friends.innerHTML += list_friends.join(', ');
    }
  })
}

// Вспомогательная функция для получения cookie сайта
function get_cookie(name) {
  let matches = document.cookie.match(new RegExp(
    "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}

// Вспомогательная функция для установки значения cookie сайта
function set_cookie(name, value) {
  let updatedCookie = encodeURIComponent(name) + "=" + encodeURIComponent(value);
  document.cookie = updatedCookie;
}
