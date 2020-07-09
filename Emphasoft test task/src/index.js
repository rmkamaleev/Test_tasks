var express = require('express');
var bodyParser = require('body-parser')
var cookieParser = require('cookie-parser')
var app = express();
let port = process.env.PORT;
const routes = require("./routes");

app.set('view engine', 'ejs');

app.use(cookieParser());
app.use('/public', express.static('public'));
app.use(bodyParser.urlencoded({ extended: true }));
app.use('/', routes);

if (port == null || port == "") {
  port = 80;
}

app.listen(port, function(err) {
    if (err) throw err;
    else console.log('Сервер запущен по URL http://localhost:80');
});
