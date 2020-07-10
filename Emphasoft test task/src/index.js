// Файл для работы сервера
var express = require('express');
var bodyParser = require('body-parser')
var cookieParser = require('cookie-parser')
var app = express();
let port = process.env.PORT;

app.use(cookieParser());
app.use('/public', express.static('public'));
app.use(bodyParser.urlencoded({ extended: true }));

app.get('/', function (req, res) {
  let req_dir = __dirname.replace('src','views');
  res.sendFile(req_dir + '/index.html');
});

if (port == null || port == "")
  port = 80;

app.listen(port, function(err) {
    if (err) throw err;
    else console.log('Сервер запущен по адресу http://localhost:80');
});
