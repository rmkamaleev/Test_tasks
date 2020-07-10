// Функция для получения токена авторизации пользователя
function auth() {
  let url = "https://oauth.vk.com/authorize?client_id=7534655&display=popup&redirect_uri=https://emphasoft-test-app.herokuapp.com/&scope=friends&response_type=token&v=5.52state=123345";
  window.location.href = url;
}
