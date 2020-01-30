const http = require('http'),
      path = require('path'),
      Routing = require('./rutas.js'),
      express = require('express'),
      bodyParser = require('body-parser'),
      mongoose = require('mongoose');
const session = require('express-session');

const PORT = 8082
const app = express()

app.use(session({
secret: 'secret',
resave: true,
saveUninitialized: true
}));

const Server = http.createServer(app)

mongoose.connect('mongodb://localhost/agenda')

app.use(express.static('client'))
app.use(bodyParser.urlencoded({ extended: true}))
app.use(bodyParser.json())
app.use('/Agenda', Routing)

Server.listen(PORT, function() {
  console.log('Server is listeng on port: ' + PORT)
})
