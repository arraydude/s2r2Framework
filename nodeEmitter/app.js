var app   = require('express')();
var http  = require('http').Server(app);
var io    = require('socket.io')(http);

var bodyParser = require('body-parser');
var jsonParser = bodyParser.json();
var port       = 3333;


/* 
    Route:  /
    Desc:   API Base url
*/
app.get('/', function(req, res)
{
  res.send('Emitter');
});


/* 
    Route:  /push/module/{}/action/{}
    Desc:   API method to delivery objects
*/
app.route('/push/module/:module/action/:action')

  .all(function(req, res, next) 
  {
    console.log('/push route is called');
    console.log(req.method);
    console.log(req.params);
    next();
  })

  .post(jsonParser, function(req, res, next) 
  {
      if (!req.body) 
      {
        console.log('Bad request');
        return res.sendStatus(400);
      }

      console.log(req.body);

      var bodyObj   = req.body;
      var uriParams = req.params;

      // Delivery object to clients for module_action
      io.emit(uriParams.module + "_" + uriParams.action, bodyObj);

      var response = {
        result: 'ok'
      };

      res.json(response);
  })


/* 
    Load listener
*/
http.listen(port, function()
{
  console.log('Emitter running on *: ' + port);
});
