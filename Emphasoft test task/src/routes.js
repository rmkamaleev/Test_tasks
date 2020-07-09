const express = require('express');
let routes = express.Router();

routes.get('/', function (req, res) {
  res.render('index');
});


module.exports = routes;
