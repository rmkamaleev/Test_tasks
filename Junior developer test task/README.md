# Решение тестового задания для вакансии Junior developer / Администратор сайта

При помощи PHP 7.0 был разработан модуль интеграции с amoCRM. 
Создан backEnd, который принимает данные от веб формы и отправляет их в amoCRM при помощи API.

В директории `data` расположены данные, отправляемые во время запроса к API.  
В директории `tokens` расположены токены для авторизации пользователя.  
В директории `js` расположен .js файл для работы логики приложения на клиентской стороне (заполнение utm-меток из ссылки в поля формы).  
В директории `css` расположен .css файл со стилями для всех страниц.  
В директории `scripts` расположены .php файлы для работы с API amoCRM.   

frontEnd приложения состоит из двух страниц: `index.php` и `upd_tokens.php`.  
На странице `index.php` отображена основная форма ввода данных пользователя, а также кнопка перехода на страницу `upd_tokens.php` для выполнения авторизации в системе.  
На странице `upd_tokens.php` отображена форма ввода данных интеграции пользователя для получения токенов авторизации и обновления.
